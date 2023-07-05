<?php

namespace App\Listeners;

use App\Events\NewProjectCreated;
use App\Notifications\NewProjectNotification;

class SendProjectNotification
{
    /**
     * Handle the event.
     *
     * @param  NewProjectCreated  $event
     * @return void
     */
    public function handle(NewProjectCreated $event)
    {
        // Retrieve supervisors associated with the project
        $supervisors = $event->project->supervisors;
    
        // Notify each supervisor about the new project
        foreach ($supervisors as $supervisor) {
            $supervisor->notify(new NewProjectNotification($event->project));
        }
    }
    
}
