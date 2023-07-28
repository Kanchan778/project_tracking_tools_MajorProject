<?php

namespace App\Http\Controllers\Student;
// use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class InnerGroupController extends Controller
{
    public function showGroup($groupId)
{
    // Fetch the project along with its group using Eloquent's `with` method
    $project = Project::with('group')->find($groupId);
    //retreive all project data from project id
    $group = Group::findOrFail($groupId);
    
    //retreive tasks data
    $tasks = Task::where('project_id', $groupId)->get();
    $tasks = $group->tasks;
    // dd($project);
    return view('student.innergroup', compact('group','tasks','project'));
}
}