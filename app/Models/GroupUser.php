<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $table = 'group_user'; // Specify the table name explicitly

    // You can optionally define timestamps as false if you don't have timestamps in the pivot table
    public $timestamps = false;

    // Define the relationship with the Group model
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
