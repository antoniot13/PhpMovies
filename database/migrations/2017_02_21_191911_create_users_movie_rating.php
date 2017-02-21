<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMovieRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_movie_rating', function (Blueprint $table) {
            $table->integer('UserId');
		    $table->string('MovieId');
		    $table->integer('Rating')->default(null);
		    $table->primary(array('UserId', 'MovieId'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_movie_rating');
    }
}
