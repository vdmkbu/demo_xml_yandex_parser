<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Writer;

class StatController extends Controller
{
    public function index(Project $project, Request $request)
    {

        if ($request->date) {
            $date = date('Y-m-d', strtotime($request->date));
        }
        else {
            $date = date('Y-m-d', now()->getTimestamp());
        }


        $previous_date = Carbon::createFromDate($date)->modify('-1 day')->format('Y-m-d');

        // получим сгруппированные значения регионов за текущую дату
        $headers = Position::with(['region'])
            ->select('region_id')
            ->where('project_id', $project->id)
            ->where('created_at', 'LIKE', $date . '%')
            ->groupBy('region_id')
            ->get();



        // получим список позиций сгруппированных для каждого слова за текущую дату
        $positions = Position::with(['word'])
            ->select('word_id', DB::raw('GROUP_CONCAT(pos) as positions'))
            ->where('project_id', $project->id)
            ->where('created_at', 'LIKE', $date . '%')
            ->groupBy('word_id')
            ->get();


        // получим список позиций сгруппированных для каждого слова за предыдущую дату
        $previous_positions = Position::with(['word'])
            ->select('word_id', DB::raw('GROUP_CONCAT(pos) as positions'))
            ->where('project_id', $project->id)
            ->where('created_at', 'LIKE', $previous_date . '%')
            ->groupBy('word_id')
            ->get();


        // готовим данные о позициях для вывода
        $result = [];
        $result_pos = [];
        foreach($positions as $word_index => $position) {

            foreach(explode(',',$position->positions) as $positions_index => $pos) {

                $difference = null;
                // если есть данные об предыдущих позициях, то сформируем данные об разнице позиций между сегодня и вчера
                if ($previous_positions->count()) {
                    $prev_pos = explode(',',$previous_positions[$word_index]->positions)[$positions_index];

                    if ($prev_pos - $pos > 0) {
                        $difference = "+" . ($prev_pos - $pos);
                    }
                    elseif ($prev_pos == 0) {
                        $difference = "∞";
                    }
                    else {
                        $difference = $prev_pos - $pos;
                    }
                }


                // добавим в массив позиция (текущая позиция => разница со сравнению со вчерашним днем)
                if ($pos == 0) {
                    $result_pos[] = [
                        "-" => $difference
                    ];
                }
                else {
                    $result_pos[] = [
                        $pos => $difference
                    ];
                }

            }

            // результат для вывода
            $result[] = [
                'word' => $position->word->word,
                'positions' => $result_pos
            ];

            $result_pos = [];
        }


        return view('stat.index', [
            'project' => $project,
            'headers' => $headers,
            'positions' => $result,
            'date' => $date,
        ]);
    }

    public function csv(Project $project, $date)
    {

        $regions = Position::with(['region'])
            ->select('region_id')
            ->where('project_id', $project->id)
            ->where('created_at', 'LIKE', $date . '%')
            ->groupBy('region_id')
            ->get();


        // готовим заголовок csv
        $headers = ['word'];
        foreach($regions as $region) {
            $headers[] = $region->region->region;
        }


        // получим список позиций сгруппированных для каждого слова за текущую дату
        $positions = Position::with(['word'])
            ->select('word_id', DB::raw('GROUP_CONCAT(pos) as positions'))
            ->where('project_id', $project->id)
            ->where('created_at', 'LIKE', $date . '%')
            ->groupBy('word_id')
            ->get();

        $body = [];
        foreach($positions as $position) {
            $body[] = array_merge([$position->word->word], explode(',', $position->positions));

        }


        $csv = Writer::createFromString();
        $csv->insertOne($headers);
        $csv->insertAll($body);

        $reader = Reader::createFromString($csv->getContent());
        return $reader->output($project->name .'-'. $date . '-' .md5(now()) .".csv");
    }
}
