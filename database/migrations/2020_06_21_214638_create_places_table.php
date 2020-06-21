<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{

    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('place_name');
            $table->string('location');
            $table->string('slug', 100);
            $table->text('initial_details');
            $table->text('tourist_attractions');
            $table->text('how_to_go');
            $table->string('feature_photo')->nullable();
            $table->string('full_photo')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('places');
    }
}
