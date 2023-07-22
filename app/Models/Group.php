<?php

// app/Models/Group.php

namespace App\Models;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // Specify the table associated with the model
    protected $table = 'groups';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'group_name',
        'project_type',
        'members',
        'roles',
        'pitch',
        'visibility',
    ];

    // Cast JSON fields to array to work with them seamlessly
    // protected $casts = [
    //     'members' => 'array',
    //     'roles' => 'array',
    // ];

    // Define any other properties, relationships, or methods as needed
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * Define the relationship with the User model (student users only).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

