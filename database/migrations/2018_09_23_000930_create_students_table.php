<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('firstName');
            $table->string('lastName');
            $table->date('DOB');
            $table->boolean('guitar')->default(false);
            $table->boolean('piano')->default(false);
            $table->boolean('dance')->default(false);
            $table->boolean('summerCamp')->default(false);
            $table->boolean('proProject')->default(false);
            $table->mediumText('notes')->nullable();
            $table->string('gender')->default('Male');
            $table->string('primaryClass');
            $table->string('reference')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
