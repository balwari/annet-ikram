<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('showtime_id');
            $table->integer('theatre_id');
            $table->integer('movie_id');
            $table->integer('no_tickets');
            $table->integer('amount');
            $table->string('showtime_name');
            $table->string('theatre_name');
            $table->string('movie_name');
            $table->string('name');
            $table->string('mobile');
            $table->unique(['showtime_id', 'theatre_id', 'movie_id']);            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
