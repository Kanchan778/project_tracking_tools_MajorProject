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
    $supervisors = User::all();
    return view(' layouts.group', ['groups' => $groupsall, 'supervisors'=>$supervisors]);
}


//assign supervisor
public function assignSupervisor(Request $request, $groupId)
    {
        $request->validate([
            'supervisor' => 'required|string',
        ]);

        $group = Group::findOrFail($groupId);

        // Find the user with the selected supervisor username
        $supervisor = User::where('username', $request->input('supervisor'))->first();
        
        if ($supervisor) {
            // Sync the supervisor with the group (many-to-many relationship)
            $group->supervisors()->syncWithoutDetaching([$supervisor->id => ['supervisor_username' => $supervisor->username]]);

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'Supervisor assigned successfully.');
        }
        else{
            $supervisors = null;
        }

        // Redirect or return a response if the supervisor username is not found
        return redirect()->back()->with('error', 'Supervisor not found.');
    }
}