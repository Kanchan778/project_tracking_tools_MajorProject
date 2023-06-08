<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectCordinatorController extends Controller
{
    
    // function for Project Cordinator
    public function index(){
        return view('ProjectCordinator/index');
    }
}
