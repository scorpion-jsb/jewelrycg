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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("product_id");
            $table->smallInteger('price')->unsigned();
            $table->smallInteger('quantity')->unsigned()->nullable();
            $table->integer("image")->nullable();
            $table->string("sku")->nullable();
            $table->string("digital_download_assets")->nullable();
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
        Schema::dropIfExists('product_variants');
    }
};
