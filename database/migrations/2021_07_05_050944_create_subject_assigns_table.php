<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_assigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_class_id')->constrained('student_classes')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->integer('subject_code')->nullable();
            $table->double('full_mark')->default(100);
            $table->double('pass_mark')->default(33);
            $table->double('subjective_mark')->default(100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_assigns');
    }
}
