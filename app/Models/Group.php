<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;
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
}
