<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration
{

    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('location');
            $table->unsignedBigInteger('restaurant_category_id')->nullable();
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->string('feature_photo');
            $table->string('cover_photo');
            $table->foreign('restaurant_category_id')->references('id')
                ->on('restaurant_categories')->onDelete('set null')->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('restaurants');
    }
}
