<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSupervisor extends Model
{
    protected $table = 'group_supervisor';
    public $timestamps = false;
    protected $fillable = ['group_id', 'user_id', 'supervisor_username'];
}