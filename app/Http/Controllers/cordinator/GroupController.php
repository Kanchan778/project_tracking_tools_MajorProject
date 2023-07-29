<?php

namespace App\Http\Controllers\cordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupSupervisor; 
use App\Models\Group;
use App\Models\User;
use App\Models\Note;



class GroupController extends Controller
{

    public function index()
    {
        $groupsall = Group::all();
    
        // Fetch supervisors attached to the specific project
        $supervisors = User::where('role', 'Supervisor')->get();
        // Assuming you have a 'groups' table with an 'id' column
        $groups = Group::with('groupSupervisor')->get();

    
        return view('layouts.group', ['groups' => $groupsall, 'supervisors' => $supervisors,'groups']);
    }


//assign supervisor
public function store(Request $request, $groupId)
{
    $supervisorUsername = $request->input('supervisor');

    // Assuming you have a 'supervisors' table with a 'username' column
    // You can adjust the model and column names based on your database schema
    $supervisor = User::where('username', $supervisorUsername)->first();

    if (!$supervisor) {
        // Handle case when the selected supervisor doesn't exist
        return redirect()->back()->with('error', 'Selected supervisor does not exist.');
    }

    // Create a new GroupSupervisor model and save the data
    $groupSupervisor = new GroupSupervisor();
    $groupSupervisor->group_id = $groupId;
    $groupSupervisor->user_id = $supervisor->id;
    $groupSupervisor->supervisor_username = $supervisorUsername; // Store the supervisor's username
    $groupSupervisor->save();

    // Handle successful assignment
    return redirect()->back()->with('success', 'Supervisor assigned successfully.');
}


//create note
public function storeNote(Request $request, $groupId)
{
    $request->validate([
        'note' => 'required|string',
    ]);

    // Get the currently authenticated user
    $currentUser = auth()->user();

    $noteData = [
        'group_id' => $groupId,
        'note' => $request->input('note'),
        'created_by' => $currentUser->username, // Store the username of the currently authenticated user
    ];

    // Create a new note using the Note model and save the data
    $note = Note::create($noteData);

    // Handle successful note creation
    return redirect()->back()->with('success', 'Note created successfully.');
}

}