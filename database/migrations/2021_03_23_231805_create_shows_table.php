<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->integer('showtime_id');
            $table->integer('theatre_id');
            $table->integer('movie_id');
            $table->string('showtime_name');
            $table->string('theatre_name');
            $table->string('movie_name');
            $table->date('start_date');
            $table->unique(['showtime_id', 'theatre_id', 'movie_id']);
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
        Schema::dropIfExists('shows');
    }
}
