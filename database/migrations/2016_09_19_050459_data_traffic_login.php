<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataTrafficLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_traffic_login', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('data_traffic_id')->unsigned();
            $table->text('user_id');
            $table->foreign('data_traffic_id')->references('id')->on('data_traffic')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_traffic_login');
    }
}
