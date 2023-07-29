<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;
use  App\Models\Note;
use App\Models\StudentNotes;
class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'project_id',
        'group_name',
        'project_type',
        'pitch',
        'visibility',
    ];

    // Define the relationship with the User model (student users only).
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hasNotIngroup()
    {
        return $this->belongsTo(GroupUser::class, 'id', 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function groupSupervisor()
    {
        // Assuming you have a 'group_supervisors' table with 'group_id' as the foreign key
        return $this->hasOne(GroupSupervisor::class, 'group_id');
    }


    public function notes()
    {
        return $this->hasMany(Note::class);
    }


    public function studentNotes()
    {
        return $this->hasMany(StudentNotes::class);
    }
}
