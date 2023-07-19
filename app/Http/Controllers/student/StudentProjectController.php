<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class StudentProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Retrieve the authenticated student
     // Retrieve the authenticated student
     $student = Auth::user();

     // Retrieve the projects created by the project coordinator
     $projects = Project::where('coordinator_id', $student->id)->get();
 
     // Return the projects and student to the view
     return view('student.dashboard', compact('projects', 'student'));
}
}