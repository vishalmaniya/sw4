<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataTraffic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_traffic', function(Blueprint $table)
        {
                $table->increments('id')->unsigned();
                $table->integer('traffic_link_id');
                $table->text('user_agent');
                $table->string('ip');
                $table->timestamps();
                
                $table->foreign('traffic_link_id')->references('id')->on('traffic_link')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_traffic');
    }
}
