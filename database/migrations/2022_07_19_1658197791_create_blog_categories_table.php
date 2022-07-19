<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {

		$table->id();
		$table->integer('parent_id',)->nullable()->default('NULL');
		$table->string('category_name');
		$table->string('category_excerpt')->nullable()->default('NULL');
		$table->string('slug');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}