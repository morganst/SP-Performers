<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_student', function (Blueprint $table) {
            
            $table->integer('classes_id')->unsigned()->nullable();
            $table->integer('student_id')->unsigned()->nullable();

            $table->foreign('classes_id')->references('id')
            ->on('classes')->onDelete('cascade');
            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade');

            $table->primary(['classes_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes_student');
    }
}
