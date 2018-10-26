<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePretestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretest', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Q1');
            $table->string('Q2');
            $table->string('Q3');
            $table->integer('Q4');
            $table->integer('Q5');
            $table->integer('Q6');
            $table->integer('Q7');
            $table->integer('Q8');
            $table->integer('Q9');
            $table->integer('Q10');
            $table->string('Q11');
            $table->integer('Q12');
            $table->integer('Q13');
            $table->integer('Q14');
            $table->integer('Q15');
            $table->integer('Q16');
            $table->integer('Q17');
            $table->integer('Q18');
            $table->integer('Q19');
            $table->integer('Q20');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pretest');
    }
}
