<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'project_id',
        'filename',
        'file_path',
        'file_type',
        'updated_at',
        'created_at',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
