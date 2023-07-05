<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'project_name',
        'section',
        'semester',
        'course',
        'project_type',
        'batch',
        'supervisor',
    ];

    //relationship with students and supervisor
    public function students()
{
    return $this->belongsToMany(Student::class);
}

// public function supervisor()
// {
//     return $this->belongsToMany(User::class, 'project_supervisors', 'project_id', 'user_id');
// }

 }
