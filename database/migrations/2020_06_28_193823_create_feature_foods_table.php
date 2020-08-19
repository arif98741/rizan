<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureFoodsTable extends Migration
{
    public function up()
    {
        Schema::create('feature_foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('food_id');
            $table->tinyInteger('order');
            $table->tinyInteger('status')->default(1);
            $table->foreign('food_id')->references('id')
                ->on('foods')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('feature_restaurants');
    }
}
