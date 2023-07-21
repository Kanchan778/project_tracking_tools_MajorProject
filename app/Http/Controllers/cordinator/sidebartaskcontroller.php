<?php


namespace App\Http\Controllers\cordinator;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;


class SideBarTaskController extends Controller
{
    public function viewSidebarTask()
    {
        // Retrieve all projects with their associated tasks
        $projectsWithTasks = Project::with('tasks')->get();

        return view('layouts.sidebartask', compact('projectsWithTasks'));
    }
}
