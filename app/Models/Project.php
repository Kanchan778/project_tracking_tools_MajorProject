<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_name',
        'section',
        'semester',
        'course',
        'project_type',
        'batch',
        'supervisor',
    ];

    // Define any relationships or additional methods for the Project model here

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
