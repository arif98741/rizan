<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureRestaurantsTable extends Migration
{
    public function up()
    {
        Schema::create('feature_restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('restaurant_id');
            $table->tinyInteger('order');
            $table->tinyInteger('status')->default(1);
            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('feature_restaurants');
    }
}
