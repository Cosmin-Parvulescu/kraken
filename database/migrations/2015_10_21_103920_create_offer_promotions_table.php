<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_promotions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('offer_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers');

            $table->string('name');
            $table->text('details');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

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
        Schema::drop('offer_promotions');
    }
}
