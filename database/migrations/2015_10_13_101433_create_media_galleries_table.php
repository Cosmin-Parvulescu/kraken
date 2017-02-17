<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_galleries', function (Blueprint $table) {
            $table->increments('id');
          
            $table->integer('description_id')->unsigned();          
            $table->foreign('description_id')->references('id')->on('descriptions');
          
            $table->string('name');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media_galleries');
    }
}
