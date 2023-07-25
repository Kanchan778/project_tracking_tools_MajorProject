<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user

        // Retrieve the projects associated with the user
        $userProjects = $user->projects;

        // Retrieve all projects
        $allProjects = Project::all();
        // dd($allProjects);
        // Return the user-attached projects and all projects to the view
        return view('supervisor.projects', compact('userProjects', 'allProjects', 'user'));
    }

    // Add other methods as needed for project management by supervisors
}
