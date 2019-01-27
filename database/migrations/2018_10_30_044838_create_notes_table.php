<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('NId');
            $table->timestamps();
            $table->string('I/B');
            $table->string('Instructor');
            $table->string('Class');
            $table->integer('SID')->unsigned();
            $table->mediumText('Text');
            $table->string('Hide')->nullable();
            $table->foreign('SID')->references('id')->on('students')->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
