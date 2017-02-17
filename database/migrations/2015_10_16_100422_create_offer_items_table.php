<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('offer_category_id')->unsigned();
            $table->foreign('offer_category_id')->references('id')->on('offer_categories');

            $table->integer('offer_item_type_id')->unsigned();
            $table->foreign('offer_item_type_id')->references('id')->on('offer_item_types');

            $table->string('name');
            $table->string('slug');

            $table->text('details');
            $table->text('short');

            $table->string('tags');

            $table->decimal('price', 6, 2);

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
        Schema::drop('offer_items');
    }
}
