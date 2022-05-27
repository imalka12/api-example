<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    public function createProject(ProjectRequest $request)
    {
        $data = $request->validated();
        $project = Project::create($data);

        return response()->json(['data' => $project]);
    }

    public function updateProject(ProjectRequest $request, Project $project)
    {
        $project = Project::whereId($project->id)->first();

        $project->update([
            'name' => $request->get('name'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);
    }

    public function deleteProject(Project $project)
    {
        $project->delete();
    }

    public function getProjectById(Project $project)
    {
        $project = Project::whereId($project->id)->first();

        return response()->json(['data' => $project]);
    }
}
