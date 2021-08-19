<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->foreignId('student_class_id')->constrained('student_classes')->onDelete('cascade')->nullable();
            $table->foreignId('student_year_id')->constrained('student_years')->onDelete('cascade')->nullable();
            $table->foreignId('student_group_id')->nullable()->constrained('student_groups')->onDelete('cascade')->nullable();
            $table->foreignId('student_shift_id')->nullable()->constrained('student_shifts')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_students');
    }
}
