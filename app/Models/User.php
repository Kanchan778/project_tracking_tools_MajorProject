<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//authenticate
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Project;
use App\Models\ProjectUser;

// class User extends Model
// {
//     public function roles()
// {
//     return $this->belongsToMany(Role::class);
// }

// public function hasAnyRole($roles)
// {
//     return $this->roles()->whereIn('name', $roles)->exists();
// }
//     use HasFactory;
// }

class User extends Authenticatable
{
    // ...

    protected $fillable = [
        'name', 'email', 'password', 'profile_img', // Add 'profile_img' to the fillable fields
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user', 'user_id', 'group_id');
    }

    public function hasNotInProject()
    {
        return $this->belongsTo(ProjectUser::class, 'id', 'user_id');
    }

    //group users roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    
}    