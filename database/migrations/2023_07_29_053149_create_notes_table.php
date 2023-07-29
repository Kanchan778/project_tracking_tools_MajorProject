<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->text('note');
            $table->string('created_by');

            // Add foreign key constraints
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->timestamps(); // Adds `created_at` and `updated_at` columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
