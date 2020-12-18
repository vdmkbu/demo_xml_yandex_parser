<?php


namespace App\Service;


use App\Models\Project;

class ProjectService
{
    public function setComplete(Project $project)
    {
        $project->state = 1;
        $project->save();
    }
}
