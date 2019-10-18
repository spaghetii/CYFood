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
            $table->string('MealName',100);
            $table->string('MealDesc')->nullable();
            $table->integer('MealPrice');
            $table->string('MealType',50);
            $table->string('MealImage')->nullable()->default("/storage/uploads/meals/default.png");
            $table->text('MealDetails')->nullable();
            $table->integer('MealQuantity')->unsigned()->nullable();
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
