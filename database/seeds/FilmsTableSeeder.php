<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('films')->insert([
            'name' => str_random(10),
            'description' => str_random(10),
            'release_date' => date("Y-m-d H:i:s",time()),
            'rating' => 7,
            'ticket_price' => 100,
            'country_id' => 1,
            'genre_id' => 1,
            'photo' => 'https://www.gstatic.com/webp/gallery3/1.sm.png',
            'created_at' => date("Y-m-d H:i:s",time()),
            'updated_at' => date("Y-m-d H:i:s",time()),

        ]);

        DB::table('films')->insert([
            'name' => str_random(10),
            'description' => str_random(10),
            'release_date' => date("Y-m-d H:i:s",time()),
            'rating' => 7,
            'ticket_price' => 200,
            'country_id' => 2,
            'genre_id' => 2,
            'photo' => 'https://www.gstatic.com/webp/gallery3/2_webp_ll.png',
            'created_at' => date("Y-m-d H:i:s",time()),
            'updated_at' => date("Y-m-d H:i:s",time()),

        ]);

        DB::table('films')->insert([
            'name' => str_random(10),
            'description' => str_random(10),
            'release_date' => date("Y-m-d H:i:s",time()),
            'rating' => 7,
            'ticket_price' => 300,
            'country_id' => 3,
            'genre_id' => 3,
            'photo' => 'https://www.gstatic.com/webp/gallery3/2.sm.png',
            'created_at' => date("Y-m-d H:i:s",time()),
            'updated_at' => date("Y-m-d H:i:s",time()),

        ]);
    }
}
