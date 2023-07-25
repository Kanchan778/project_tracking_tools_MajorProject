<?php

namespace App\Http\Controllers\cordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Group;
use App\Models\Project;
use App\Models\User;

class GroupController extends Controller
{
    public function index()
{
    $groupsall = Group::all();
    // dd($groupsall);
    // Pass the groups data to the view
    return view(' layouts.group', ['groups' => $groupsall]);
}


//assign supervisor
public function assignSupervisor(Request $request)
    {
        // Get the group ID and supervisor ID from the request
        $groupId = $request->input('group_id');
        $supervisorId = $request->input('supervisor_id');

        // Find the group
        $group = Group::find($groupId);

        // Check if the group exists
        if (!$group) {
            return response()->json(['message' => 'Group not found'], 404);
        }

        // Find the project associated with the group
        $project = $group->project;

        // Check if the project exists and has a supervisor assigned
        if (!$project || $project->supervisor_id) {
            return response()->json(['message' => 'Project not found or already has a supervisor assigned'], 404);
        }

        // Find the supervisor user
        $supervisor = User::find($supervisorId);

        // Check if the supervisor user exists and is a supervisor role
        if (!$supervisor || $supervisor->role !== 'supervisor') {
            return response()->json(['message' => 'Supervisor not found or invalid role'], 404);
        }

        // Assign the supervisor to the project
        $project->supervisor_id = $supervisor->id;
        $project->save();

        return response()->json(['message' => 'Supervisor assigned successfully'], 200);
    }
}
