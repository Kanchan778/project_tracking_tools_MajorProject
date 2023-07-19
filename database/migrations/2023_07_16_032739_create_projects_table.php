<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('section');
            $table->string('semester');
            $table->string('course');
            $table->string('project_type');
            $table->string('batch');
            $table->text('supervisor');
            $table->date('start_date');
            $table->date('due_date');
            $table->string('visibility');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
