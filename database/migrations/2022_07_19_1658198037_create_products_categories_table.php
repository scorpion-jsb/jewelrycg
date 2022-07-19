<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('products_categories', function (Blueprint $table) {

		$table->id();
		$table->integer('parent_id',)->nullable()->default('NULL');
		$table->string('category_name');
		$table->string('slug');
		$table->string('category_excerpt')->nullable()->default('NULL');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('products_categories');
    }
}