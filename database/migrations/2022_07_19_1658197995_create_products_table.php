<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

		$table->id();
		$table->string('name');
		$table->text('description');
		$table->smallInteger('price',);
		$table->smallInteger('quantity',)->nullable()->default('NULL');
		$table->string('category',24);
		$table->string('slug')->nullable()->default('NULL');
		$table->integer('vendor',)->nullable()->default('NULL');
		$table->datetime('published_at')->nullable()->default('NULL');
		$table->integer('status',)->nullable()->default('NULL');
		$table->string('sku')->nullable()->default('NULL');
		$table->integer('price_discount',)->nullable()->default('NULL');
		$table->string('price_discount_type')->nullable()->default('NULL');
		$table->datetime('price_discount_start')->nullable()->default('NULL');
		$table->datetime('price_discount_end')->nullable()->default('NULL');
		$table->string('shipping_type')->nullable()->default('NULL');
		$table->integer('shipping_cost',)->nullable()->default('NULL');
		$table->integer('is_digital',)->nullable()->default('NULL');
		$table->integer('is_virtual',)->nullable()->default('NULL');
		$table->integer('is_backorder',)->nullable()->default('NULL');
		$table->integer('is_madetoorder',)->nullable()->default('NULL');
		$table->string('product_thumbnail')->nullable()->default('NULL');
		$table->text('product_images');
		$table->text('product_3dpreview');
		$table->text('digital_download_assets');
		$table->integer('digital_download_assets_count',)->nullable()->default('NULL');
		$table->integer('digital_download_assets_limit',)->nullable()->default('NULL');
		$table->string('product_attributes')->nullable()->default('NULL');
		$table->string('product_attribute_values')->nullable()->default('NULL');
		$table->timestamps();
		$table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}