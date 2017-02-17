<?php

use Illuminate\Database\Seeder;

class OfferItemTypeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('offer_item_types')->insert([
            'id' => 1,
            'name' => 'Product'
        ]);

        DB::table('offer_item_types')->insert([
            'id' => 2,
            'name' => 'Service'
        ]);
    }
}
