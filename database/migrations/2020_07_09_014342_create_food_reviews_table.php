<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->enum('rating', [1, 2, 3, 4, 5]);
            $table->text('comment')->nullable();
            $table->string('ip')->nullable();
            $table->timestamp('next_comment');
            $table->tinyInteger('status')->default(0);
            $table->foreign('food_id')->references('id')
                ->on('foods')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('food_reviews');
    }
}
