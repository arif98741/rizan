<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('location');
            $table->unsignedBigInteger('company_category_id')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('feature_photo')->nullable();
            $table->string('cover_photo');
            $table->foreign('company_category_id')->references('id')
                ->on('companies')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
