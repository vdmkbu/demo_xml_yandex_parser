<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Region;
use App\Models\Word;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['words', 'regions'])->where('user_id', auth()->id())->get();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $regions = Region::all();
        return view('projects.create', [
            'regions' => $regions
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required'],
            'host' => ['required'],
            'regions' => ['required'],
            'words' => ['required']
        ]);

        $project = new Project();
        $project->user_id = auth()->id();
        $project->name = $request->name;
        $project->host = $request->host;

        $project->save();

        $regions = Region::find($request->regions);
        $project->regions()->attach($regions);

        $words = [];
        foreach(explode(PHP_EOL, $request->words) as $word_item) {

            $words[] = new Word(['word' => trim($word_item)]);
        }

        $project->words()->saveMany($words);


        return redirect(route('projects'))->with('success', 'Project has been created');
    }

    public function edit(Project $project)
    {
        $regions = Region::all();


        return view('projects.edit', [
            'project' => $project,
            'regions' => $regions,
            'selected_regions' => $project->regions()->get()->pluck('id')->toArray()
        ]);

    }

    public function update(Project $project, Request $request)
    {

        $this->validate($request, [
            'name' => ['required'],
            'host' => ['required'],
            'regions' => ['required'],
            'words' => ['required']
        ]);

        $project->name = $request->name;
        $project->host = $request->host;
        $project->save();

        $regions = Region::find($request->regions);
        $project->regions()->sync($regions);

        // слова в текущем объекте project
        $project_words = $project->words()->get()->pluck('word')->toArray();

        // слова из формы редактирования
        $form = array_map(function ($value) { return trim($value); }, explode(PHP_EOL, $request->words));


        // новые слова: добавляем в Words
        $words_ids = [];
        if (count(array_diff($form, $project_words))) {

            $words = [];
            foreach(array_diff($form, $project_words) as $word_item) {
                $words[] = new Word(['word' => trim($word_item)]);
            }

            $ids = $project->words()->saveMany($words);

            foreach($ids as $word) {
                $words_ids[] = $word->id;
            }

        }



        // для существующих слов получим id и обновим в pivot таблице
        $w = [];
        foreach(array_diff($form,array_diff($form, $project_words)) as $word_item) {

            $w[] = $project->words()->where('word', $word_item)->get()->pluck('id')->first();
        }

        $project->words()->sync(array_merge($words_ids,$w));

        return redirect(route('projects'))->with('success', 'Project has been updated');

    }
}
