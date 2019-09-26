<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('OrdersID');
            $table->string('OrdersNum');
            $table->text('OrdersDetails');
            $table->dateTime('OrdersCreate');
            $table->dateTime('OrdersUpdate');
            $table->boolean('OrdersFinish');
            $table->bigInteger('MemberID')->unsigned();
            $table->bigInteger('MealID')->unsigned();
            $table->foreign('MemberID')->references('MemberID')->on('members');
            $table->foreign('MealID')->references('MealID')->on('meals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
