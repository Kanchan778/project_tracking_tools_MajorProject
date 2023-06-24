<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Logic for student dashboard
        // Return the view for the student dashboard
        return view('dashboard.student');
    }
}