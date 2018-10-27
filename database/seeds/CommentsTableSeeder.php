<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('comments')->insert([
            'comment' => str_random(10),
            'user_id' => 1,
            'film_id' => 1,
            'created_at' => date("Y-m-d H:i:s",time()),
            'updated_at' => date("Y-m-d H:i:s",time()),

        ]);

        DB::table('comments')->insert([
            'comment' => str_random(10),
            'user_id' => 1,
            'film_id' => 2,
            'created_at' => date("Y-m-d H:i:s",time()),
            'updated_at' => date("Y-m-d H:i:s",time()),

        ]);


        DB::table('comments')->insert([
            'comment' => str_random(10),
            'user_id' => 1,
            'film_id' => 3,
            'created_at' => date("Y-m-d H:i:s",time()),
            'updated_at' => date("Y-m-d H:i:s",time()),

        ]);

    }
}
