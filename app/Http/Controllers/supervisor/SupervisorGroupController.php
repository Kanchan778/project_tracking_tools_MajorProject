<?php
namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;


class SupervisorGroupController extends Controller
{
    public function index()
    {
     
        return view('supervisor.group');
    }

    // Add other methods as needed for project management by supervisors
}
