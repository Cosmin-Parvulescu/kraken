<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('offer_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers');

            $table->string('name');
            $table->string('slug');

            $table->text('details');

            $table->string('short');

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
        Schema::drop('offer_categories');
    }
}
