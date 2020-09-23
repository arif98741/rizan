<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name', 150);
            $table->string('sku', 15);
            $table->float('retail_price', 8, 2)->nullable();
            $table->float('sale_price', 8, 2);
            $table->float('whole_price', 8, 2)->nullable();
            $table->string('brand_name', 50)->nullable();
            $table->string('category_name', 50)->nullable();
            $table->integer('stock')->nullable();
            $table->integer('low_stock')->nullable();
            $table->string('size', 20)->nullable();
            $table->string('color', 20)->nullable();
            $table->string('url', 255)->nullable();
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
        Schema::dropIfExists('products');
    }
}
