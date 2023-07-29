<?php
// app/Http/Controllers/Student/InnerGroupController.php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\StudentNotes;


class InnerGroupController extends Controller
{
        // Retrieve the currently authenticated student
        public function index()
        {
            // Retrieve the currently authenticated user
            $user = Auth::user();
            $supervisors = User::where('role', 'Supervisor')->get();
        
            // Ensure the authenticated user is a student (role 'student')
            if (!$user || $user->role !== 'student') {
                abort(403, 'Unauthorized');
            }
        
            // Get the first group that the student is attached to using the 'groups' relationship
            $group = $user->groups()->first();
        
            // Check if $group is not null before accessing its properties
            if ($group) {
                $notes = Note::where('group_id', $group->id)->get();
            } else {
                // Handle the case where the student has no associated groups
                $notes = []; // Empty array or any other default value as needed
            }
        
            // Now you have the groups related to the authenticated user
            // You can pass this data to your view or use it as needed
        
            // Pass the data to the view
            return view('student.innergroup', compact('group', 'supervisors', 'notes'));
        }
        


        //store roles
        public function store(Request $request)
{
    $rolesData = $request->input('roles');

    foreach ($rolesData as $userId => $roles) {
        $user = User::find($userId);
        if ($user) {
            // Remove existing roles for the user
            $user->roles()->detach();

            // Attach the new roles specified in the form
            foreach ($roles as $role) {
                $user->roles()->attach($role);
            }
        }
    }


    return redirect()->back()->with('success', 'Roles assigned successfully.');
}

//store note
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

