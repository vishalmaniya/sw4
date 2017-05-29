<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lession', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapter_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->integer('position');
            $table->text('video_url');
            $table->string('video_length', 100);
            $table->integer('video_width');
            $table->integer('video_height');
            
            $table->timestamps();
            
            $table->foreign('chapter_id')->references('id')->on('chapter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lession');
    }
}
