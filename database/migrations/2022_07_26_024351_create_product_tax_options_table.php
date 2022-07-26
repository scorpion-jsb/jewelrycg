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
        Schema::create('product_tax_options', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('tax_option_id');
            $table->integer('price')->default(0);
            $table->enum('type', ['flat', 'percent']);
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
        Schema::dropIfExists('product_tax_options');
    }
};
