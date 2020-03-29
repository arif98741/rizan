<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('location');
            $table->unsignedBigInteger('restaurant_category_id')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('feature_photo');
            $table->string('cover_photo');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->rememberToken();
            $table->foreign('restaurant_category_id')->references('id')->on('restaurants')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('companies');
        Schema::dropForeign('company_category_id');
    }
}
