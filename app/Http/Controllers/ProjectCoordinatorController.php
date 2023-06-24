<?php
use App\Http\Controllers\Controller;

class ProjectCoordinatorController extends Controller
{
    public function index()
    {
        // Logic for project coordinator dashboard
        // Return the view for the project coordinator dashboard
        return view('dashboard.projectCoordinator');
    }
}