
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['student', 'supervisor', 'project_coordinator']);
            $table->string('section')->nullable();
            $table->unsignedInteger('semester')->nullable();
            $table->enum('course', ['BBA', 'BBA-TT', 'BBA-BI', 'BCIS'])->nullable();
            $table->string('department')->nullable(); // Added department column
            $table->string('profile_img')->nullable(); // Added profile_img column (nullable)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
