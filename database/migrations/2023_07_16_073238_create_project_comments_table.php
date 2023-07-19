<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('project_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');
            $table->string('username');
            $table->text('comment');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });

       
    }

    public function down()
    {
        Schema::dropIfExists('project_comments');
    }
}