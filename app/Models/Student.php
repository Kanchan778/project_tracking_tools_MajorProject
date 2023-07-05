<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class Student extends Model
{
    use HasFactory;

    //relationship with projects
    public function projects()
{
    return $this->belongsToMany(Project::class);
}

}
