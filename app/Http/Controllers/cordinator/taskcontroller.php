<?php

namespace App\Http\Controllers\cordinator;
// use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function showProject($projectId)
{
    //retreive all project data from project id
    $project = Project::findOrFail($projectId);
    
    //retreive tasks data
    $tasks = Task::where('project_id', $projectId)->get();
    $tasks = $project->tasks;
    // dd($project);
    return view('layouts.nav-side-project', compact('project','tasks'));
}


    // create task methods for the TaskController here
    public function createTask(Request $request, $projectId)
{
    $request->validate([
        'task-name' => 'required|string|max:255',
        'task-description' => 'nullable|string',
        'start_date' => 'nullable|date',
        'due_date' => 'nullable|date|after_or_equal:start_date',
    ]);

    $task = new Task([
        'project_id' => $projectId,
        'name' => $request->input('task-name'),
        'description' => $request->input('task-description'),
        'start_date' => $request->input('start_date'),
        'due_date' => $request->input('due_date'),
    ]);

    $task->save();

    // Redirect or return a response as needed
    return redirect()->back()->with('success', 'Task created successfully.');
}



    
}
