<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetableItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('timetable_id')->unsigned();
            $table->foreign('timetable_id')->references('id')->on('timetables');

            $table->string('name');

            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();

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
        Schema::drop('timetable_items');
    }
}
