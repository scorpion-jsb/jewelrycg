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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id',)->nullable();
            $table->integer('product_id',)->nullable();
            $table->string('product_variant');
            $table->tinyInteger('quantity')->unsigned();
            $table->smallInteger('price')->unsigned();
            $table->smallInteger('status_fulfillment')->default(1); // 1: pending, 2: shipped, 3: delivered
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
        Schema::dropIfExists('order_items');
    }
};
