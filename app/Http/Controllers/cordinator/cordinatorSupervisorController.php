<?php

namespace App\Http\Controllers\Cordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CordinatorSupervisorController extends Controller
{
    public function index()
    {
        return view('cordinator.supervisor.supervisor');
    }
}
