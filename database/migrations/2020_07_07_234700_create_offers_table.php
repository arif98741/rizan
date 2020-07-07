<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{

    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('food_id')->nullable();
            $table->unsignedBigInteger('restaurant_id');
            $table->double('offer_price', 8, 2);
            $table->date('start_date')->nullable();
            $table->date('end_date');
            $table->text('offer_description')->nullable();
            $table->foreign('food_id')->references('id')
                ->on('foods')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('offers');
        Schema::dropForeign('food_id');
        Schema::dropForeign('restaurant_id');
    }
}
