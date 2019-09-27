<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('ShopID');
            $table->string('ShopName',50)->unique();
            $table->string('ShopType',20);
            $table->string('ShipTime',20);
            $table->binary('ShopImage');
            $table->string('ShopAddress')->unique();
            $table->string('ShopEmail',50)->nullable();
            $table->string('ShopPhone',30)->nullable();
            $table->string('ShopPassword',60)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
