<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//authenticate
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Project;

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
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    //group users roles
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    
}    