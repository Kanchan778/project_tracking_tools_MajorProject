<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function roles()
{
    return $this->belongsToMany(Role::class);
}

public function hasAnyRole($roles)
{
    return $this->roles()->whereIn('name', $roles)->exists();
}
    use HasFactory;
}
