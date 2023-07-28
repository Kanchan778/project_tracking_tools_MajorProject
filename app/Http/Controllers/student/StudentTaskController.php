<?php

namespace App\Http\Controllers\cordinator;
// use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class StudentTaskController extends Controller
{
    public function showGroup($groupId)
{
    //retreive all project data from project id
    $group = Group::findOrFail($groupId);
    
    //retreive tasks data
    $issue = Issue::where('group_id', $groupId)->get();
    $issue= $group->issue;
    // dd($project);
    return view('students.issue', compact('group','tasks'));
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
