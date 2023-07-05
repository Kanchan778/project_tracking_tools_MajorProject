<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Project;

class GroupController extends Controller
{
   
       public function index()
{
    return view('Student.Group');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'group_name' => 'required',
        'project_title' => 'required',
        'members.*.email' => 'required|email',
        'members.*.role' => 'required',
    ]);

    $group = Group::create([
        'group_name' => $validatedData['group_name'],
        'project_title' => $validatedData['project_title'],
    ]);

    foreach ($validatedData['members'] as $memberData) {
        $member = new Member([
            'email' => $memberData['email'],
            'role' => $memberData['role'],
        ]);
        $group->members()->save($member);
    }

    return redirect()->route('groups.index')->with('success', 'Group created successfully.');
}

}