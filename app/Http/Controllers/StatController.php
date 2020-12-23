<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Project;
use App\Repositories\PositionRepository;
use App\Service\CSVService;
use App\Service\StatPositionService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use League\Csv\Reader;
use League\Csv\Writer;

class StatController extends Controller
{
    protected PositionRepository $repository;
    protected StatPositionService $service;
    protected CSVService $csv;

    public function __construct(PositionRepository $repository, StatPositionService $service, CSVService $csv)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->csv = $csv;
    }

    public function index(Project $project, Request $request)
    {

        if (Gate::denies('project_owner', $project)) {
            abort(403, 'Access denied');
        }

        if ($request->date) {
            $date = date('Y-m-d', strtotime($request->date));
        }
        else {
            $date = date('Y-m-d', now()->getTimestamp());
        }

        $previous_date = Carbon::createFromDate($date)->modify('-1 day')->format('Y-m-d');

        // получим сгруппированные значения регионов за текущую дату
        $headers = $this->repository->getGroupedRegionsByDate($date, $project->id);

        // получим список позиций сгруппированных для каждого слова за текущую дату
        $current_positions = $this->repository->getGroupedPositionsByDate($date, $project->id);

        // получим список позиций сгруппированных для каждого слова за предыдущую дату
        $previous_positions = $this->repository->getGroupedPositionsByDate($previous_date, $project->id);


        // готовим данные о позициях для вывода
        $positions = $this->service->getPositions($current_positions, $previous_positions);

        return view('stat.index', [
            'project' => $project,
            'headers' => $headers,
            'positions' => $positions,
            'date' => $date,
        ]);
    }

    public function csv(Project $project, $date)
    {

        if (Gate::denies('project_owner', $project)) {
            abort(403, 'Access denied');
        }

        if (!$date) {
            $date = date('Y-m-d', now()->getTimestamp());
        }

        // получим сгруппированные значения регионов за текущую дату
        $regions = $this->repository->getGroupedRegionsByDate($date, $project->id);

        // получим список позиций сгруппированных для каждого слова за текущую дату
        $positions = $this->repository->getGroupedPositionsByDate($date, $project->id);

        // готовим заголовок csv
        $headers = $this->csv->prepareHeaders($regions);
        // готовим тело csv
        $body = $this->csv->prepareBody($positions);

        // формируем и возвращаем объект csv
        $csv = $this->csv->make($headers, $body);

        // читаем и отправляем на скачивание
        $reader = Reader::createFromString($csv->getContent());
        return $reader->output($project->name .'-'. $date . '-' .md5(now()) .".csv");
    }

    public function dynamic(Project $project)
    {

        if (Gate::denies('project_owner', $project)) {
            abort(403, 'Access denied');
        }


        // сгруппированные регионы
        $regions = $this->repository->getGroupedRegions($project->id);

        // сгруппированные слова
        $words = $this->repository->getGroupedWords($project->id);

        $rows = $this->service->getPositionsDynamic($project->id, $regions, $words, 7);


        return view('stat.dynamic', [
            'project' => $project,
            'rows' => $rows
        ]);
    }
}
