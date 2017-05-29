<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lession_id')->unsigned();
            $table->text('description');
            $table->integer('position');
            $table->string('type');
            $table->integer('points');
            $table->integer('hint_point');
            $table->string('hint_1');
            $table->string('hint_2');
            $table->string('hint_3');
            $table->tinyInteger('hintanswer_1');
            $table->tinyInteger('hintanswer_2');
            $table->tinyInteger('hintanswer_3');
            $table->timestamps();
            
            $table->foreign('lession_id')->references('id')->on('lession')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
