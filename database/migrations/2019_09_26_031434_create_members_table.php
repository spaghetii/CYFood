<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('MemberID');
            $table->string('MemberName',80);
            $table->string('MemberEmail',50)->unique();
            $table->string('MemberPhone',30);
            $table->string('MemberPassword',60);
            $table->boolean('MemberPermission')->default(false);
            $table->string("MemberCredit")->nullable();
            $table->text('token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
