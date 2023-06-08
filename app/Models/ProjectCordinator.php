<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCordinator extends Model
{
    use HasFactory;
    protected $table ='project_cordinators';
    protected $fillable =[
        'username',
        'email',
        'profile_image',
        'project_type',
    ];
}
