<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('modules')->insert([
            'id' => 1,
            'name' => 'Description'
        ]);

        DB::table('modules')->insert([
            'id' => 2,
            'name' => 'Offer'
        ]);

        DB::table('modules')->insert([
            'id' => 3,
            'name' => 'Contact'
        ]);
    }
}
