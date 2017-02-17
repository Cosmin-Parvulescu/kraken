<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_items', function (Blueprint $table) {
            $table->increments('id');
          
            $table->integer('media_gallery_id')->unsigned();          
            $table->foreign('media_gallery_id')->references('id')->on('media_galleries');
          
            $table->string('name');
            $table->text('details');
          
            $table->string('mime');
            $table->string('path');
          
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
        Schema::drop('media_items');
    }
}
