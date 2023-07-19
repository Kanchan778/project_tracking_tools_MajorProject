<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class SupervisorProjectController extends Controller
{
    public function index()
    {
        // Retrieve projects for the logged-in supervisor
        $projects = Project::where('supervisor_id', auth()->user()->id)->get();

        // Add any additional logic or data retrieval as needed

        // Return the view with the projects data
        return view('supervisor.projects.index', compact('projects'));
    }

    // Add other methods as needed for project management by supervisors
}

