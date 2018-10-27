<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('countries')->insert([
            'name' => 'USA'
        ]);

        DB::table('countries')->insert([
            'name' => 'UAE'
        ]);

        DB::table('countries')->insert([
            'name' => 'Bangladesh'
        ]);
    }
}
