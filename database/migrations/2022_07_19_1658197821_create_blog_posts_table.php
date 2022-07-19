<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
	public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('status',)->nullable();
            $table->integer('author_id',)->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('post_excerpt');
            $table->integer('thumbnail')->nullable();
            $table->text('post');
            $table->integer('tags_id');
            $table->integer('categorie_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}