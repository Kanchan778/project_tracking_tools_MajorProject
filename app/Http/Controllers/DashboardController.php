<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function student()
    {
        // Logic for student dashboard
        return view('dashboard.student');
    }

    public function supervisor()
    {
        // Logic for supervisor dashboard
        return view('dashboard.supervisor');
    }

    public function projectCoordinator()
    {
        
        // Logic for project coordinator dashboard
        return view('dashboard.projectCoordinator');
    }
}
