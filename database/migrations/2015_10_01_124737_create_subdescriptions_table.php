<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubdescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdescriptions', function (Blueprint $table) {
            $table->increments('id');
          
            $table->integer('description_id')->unsigned();          
            $table->foreign('description_id')->references('id')->on('descriptions');
          
            $table->string('name');
            $table->string('slug');

            $table->text('details');
          
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
        Schema::drop('subdescriptions');
    }
}
