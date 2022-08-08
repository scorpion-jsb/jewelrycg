<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTagsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_tags', function (Blueprint $table) {

		$table->id();
		$table->string('name');
		$table->string('slug');
		$table->text('description')->nullable();
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_tags');
    }
}
