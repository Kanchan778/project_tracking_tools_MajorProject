<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'section',
        'semester',
        'course',
        'project_type',
        'batch',
        'supervisor',
        'start_date',
        'due_date',
        'visibility',
    ];

    //relationship
    public function users()
{
    return $this->belongsToMany(User::class);
}
}

