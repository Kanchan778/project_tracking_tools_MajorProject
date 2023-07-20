<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'description',
        'start_date',
        'due_date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
