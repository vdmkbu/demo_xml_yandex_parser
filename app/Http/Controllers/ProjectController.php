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
            $words[] = new Word(['word' => $word_item]);
        }

        $project->words()->saveMany($words);

        return redirect(route('projects'))->with('success', 'Project has been created');
    }
}
