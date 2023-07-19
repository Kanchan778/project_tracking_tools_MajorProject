<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    protected $table = 'project_user';

    // Define the fillable columns
    protected $fillable = [
        'user_type',
        'username',
    ];

    // ...
}
