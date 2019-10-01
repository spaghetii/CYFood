<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('MealID');
            $table->string('MealName');
            $table->string('MealDesc',100)->nullable();
            $table->string('MealPrice',30);
            $table->string('MealType',50);
            $table->string('MealImage')->nullable();
            $table->text('MealDetails')->nullable();
            $table->integer('MealQuantity')->unsigned();
            $table->bigInteger('ShopID')->unsigned();
            $table->foreign('ShopID')->references('ShopID')->on('shops');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
