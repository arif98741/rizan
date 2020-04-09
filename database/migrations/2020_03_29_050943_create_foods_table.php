<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('restaurant_id');
            $table->double('price',8,2);
            $table->string('slug',100);
            $table->text('description');
            $table->text('feature_photo')->nullable();
            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('foods');
        Schema::dropForeign('restaurant_id');
    }
}
