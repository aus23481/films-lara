<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->insert([
            'name' => 'Rock'
        ]);

        DB::table('genres')->insert([
            'name' => 'Local'
        ]);

        DB::table('genres')->insert([
            'name' => 'Mock'
        ]);
    }
}
