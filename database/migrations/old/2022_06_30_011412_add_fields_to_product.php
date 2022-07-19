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
        Schema::table('products', function (Blueprint $table) {
            $table->integer("status")->nullable();
            $table->string("sku")->nullable();
            $table->integer("price_discount")->nullable();
            $table->string("price_discount_type")->nullable();
            $table->dateTime("price_discount_start")->nullable();
            $table->dateTime("price_discount_end")->nullable();
            $table->string("shipping_type")->nullable();
            $table->integer("shipping_cost")->nullable();
            $table->integer("is_digital")->nullable();
            $table->integer("is_virtual")->nullable();
            $table->integer("is_backorder")->nullable();
            $table->integer("is_madetoorder")->nullable();
            $table->string("product_thumbnail")->nullable();
            $table->text("product_images")->nullable();
            $table->text("product_3dpreview")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("status");
            $table->dropColumn("sku");
            $table->dropColumn("price_discount");
            $table->dropColumn("price_discount_type");
            $table->dropColumn("price_discount_start");
            $table->dropColumn("price_discount_end");
            $table->dropColumn("shipping_type");
            $table->dropColumn("shipping_cost");
            $table->dropColumn("is_digital");
            $table->dropColumn("is_virtual");
            $table->dropColumn("is_backorder");
            $table->dropColumn("is_madetoorder");
            $table->dropColumn("product_thumbnail");
            $table->dropColumn("product_images");
            $table->dropColumn("product_3dpreview");
        });
    }
};
