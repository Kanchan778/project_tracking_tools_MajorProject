<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Group;

class Note extends Model
{
    protected $table = 'notes'; // Specify the table name if it's different from the default convention
    protected $fillable = ['group_id', 'note', 'created_by'];
    public $timestamps = true; // Set to true if you want to use `created_at` and `updated_at` columns

    // Relationships
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
