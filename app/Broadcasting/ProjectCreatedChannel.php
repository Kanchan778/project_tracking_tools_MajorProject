<?php

namespace App\Broadcasting;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\Supervisors;


class ProjectCreatedChannel
{
    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Project  $project
     * @return array|bool
     */
    public function join(Project $project)
    {
        $students = $project->students()->pluck('id')->toArray();
        $supervisors = $project->supervisor()->pluck('id')->toArray();

        // Check if the authenticated user is a student or supervisor associated with the project
        if (in_array(Auth::id(), $students) || in_array(Auth::id(), $supervisors)) {
            return true;
        }

        return false;
    }
}
