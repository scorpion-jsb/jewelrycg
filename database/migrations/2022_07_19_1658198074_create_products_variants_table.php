<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsVariantsTable extends Migration
{
    public function up()
    {
        Schema::create('products_variants', function (Blueprint $table) {

		$table->bigIncrements('id')->unsigned();
		$table->integer('product_id',);
		$table->integer('variant_attribute_id',);
		$table->string('variant_attribute_value');
		;
		$table->string('variant_sku')->nullable()->default('NULL');
		$table->text('variant_thumbnail');
		$table->text('variant_name');
		$table->integer('variant_quantity',)->nullable()->default('NULL');
		$table->text('variant_assets');
		$table->text('digital_download_assets');
		$table->integer('digital_download_assets_count',)->nullable()->default('NULL');
		$table->integer('digital_download_assets_limit',)->nullable()->default('NULL');
		$table->integer('price_discount',)->nullable()->default('NULL');
		->nullable()->default('NULL');
		$table->datetime('price_discount_start')->nullable()->default('NULL');
		$table->datetime('price_discount_end')->nullable()->default('NULL');
		->nullable()->default('NULL');
		$table->integer('shipping_cost',)->nullable()->default('NULL');
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');
		$table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('products_variants');
    }
}