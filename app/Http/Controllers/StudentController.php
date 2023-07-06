<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Logic for student dashboard
        // Return the view for the student dashboard
        return view('dashboard.student');
    }

//     public function studentDashboard()
// {
//     $user = auth()->user();

//     $projects = Project::where('semester', $user->semester)
//         ->where('section', $user->section)
//         ->get();

//     return view('dashboard.student', ['projects' => $projects]);
// }
}