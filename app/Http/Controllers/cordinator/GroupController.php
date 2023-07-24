<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group; // Make sure to import the Group model if not already imported

class GroupController extends Controller
{
    public function index()
{
    $groups = Group::all();
    dd($groups);
    // Pass the groups data to the view
    return view('layouts.group', ['groups' => $groups]);
}

}
