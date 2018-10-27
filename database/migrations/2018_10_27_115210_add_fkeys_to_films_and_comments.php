<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkeysToFilmsAndComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //films
        Schema::table('films', function($table) {
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('country_id')->references('id')->on('countries');
        });

        //comments
        Schema::table('comments', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('film_id')->references('id')->on('films');	   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
