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
        Schema::create('products_variants', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->integer("variant_attribute_id");
            $table->string("variant_attribute_value");
            $table->float("variant_price");
            $table->string("variant_sku")->nullable();
            $table->integer("variant_quantity")->nullable();
            $table->text("variant_images")->nullable();
            $table->text("variant_assets")->nullable();
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
        Schema::dropIfExists('products_variants');
    }
};
