<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Support\Facades\Broadcast;
use App\Events\NewProjectCreated;


class ProjectController extends Controller
{
  
        public function index()
        {
            $projects = Project::all(); // Retrieve the projects from the database or any other source
    
            // Fetch the semesters and sections from the User table
            $semesters = User::distinct('semester')->pluck('semester');
            $sections = User::distinct('section')->pluck('section');
    
            // Fetch the supervisors from the User table who have the Supervisor role
            $supervisors = User::where('role', 'Supervisor')->get('username');
    
            return view('cordinator.Project', [
                'projects' => $projects,
                'semesters' => $semesters,
                'sections' => $sections,
                'supervisors' => $supervisors
            ]);

    //return view('cordinator.Project', ['projects' => $projects]);

    // Get the authenticated user
    $user = auth()->user();

    // Retrieve the projects matching the semester and section of the user
    $projects = Project::where('semester', $user->semester)
                        ->where('section', $user->section)
                        ->get();

    return view('/dashboard/student', ['projects' => $projects]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'project-name' => 'required',
            'section' => 'required',
            'semester' => 'required',
            'course' => 'required',
            'project-type' => 'required',
            'batch' => 'required',
            'supervisor' => 'required|array',
        ]);

        // Create a new Project instance
        $project = new Project;
        $project->project_name = $validatedData['project-name'];
        $project->section = $validatedData['section'];
        $project->semester = $validatedData['semester'];
        $project->course = $validatedData['course'];
        $project->project_type = $validatedData['project-type'];
        $project->batch = $validatedData['batch'];
        $project->supervisor = implode(', ', $validatedData['supervisor']);

        // Save the project data to the database
        $project->save();

    //     // Check if the project type is "Major Project"
    // if ($project->project_type === 'Major Project') {
    //     // Broadcast a message about the new project
    //     Broadcast::dispatch(new NewProjectCreated($project));
    // }

    // // Retrieve students matching the semester and section of the project
    // $students = Student::where('semester', $project->semester)
    //     ->where('section', $project->section)
    //     ->get();

    // // Add the project to each student's project list
    // foreach ($students as $student) {
    //     $student->projects()->attach($project->id);
    // }

        // Redirect to a success page or return a response
        return redirect()->back()->with('success', 'Project created successfully!');
    }


    //
}