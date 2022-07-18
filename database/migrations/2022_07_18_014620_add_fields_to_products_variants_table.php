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
        Schema::dropIfExists('product_variants');

        Schema::table('products_variants', function (Blueprint $table) {
            $table->dropColumn('variant_images');
            $table->text("variant_thumbnail")->nullable();
            $table->text("variant_name")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_variants', function (Blueprint $table) {
            //
        });
    }
};
