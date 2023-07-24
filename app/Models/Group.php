<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
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
}
