<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers_wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('amount');
            $table->string('type', 10)->default('add')->comment('add, withdraw');
            $table->tinyInteger('status')->default(0)->comment('0: pending, 1: balanced');
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
        Schema::dropIfExists('sellers_wallet_histories');
    }
};
