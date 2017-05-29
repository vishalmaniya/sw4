<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestionAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questions_id')->unsigned();
            $table->string('language');
            $table->text('answer');
            $table->text('description');
            $table->string('type');
            $table->integer('point_correct');
            $table->integer('point_incorrect');
            $table->text('default');
            $table->timestamps();
            
            $table->foreign('questions_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_answer');
    }
}
