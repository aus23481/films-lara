<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            //Name,Description,Realease Date,Rating,Ticket Price,Country,Genre,Photo
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->timestamp("release_date");
            $table->integer("rating");
            $table->double("ticket_price");
            $table->integer("country_id")->unsigned()->default(1);
            $table->integer("genre_id")->unsigned()->default(1);
            $table->string("photo", 250);
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
        Schema::dropIfExists('films');
    }
}
