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
        //
        Schema::table('product_materials', function (Blueprint $table) {
            $table->string('material_weight')->nullable()->change();
            $table->integer('is_diamond')->nullable()->change();
            $table->integer('diamond_id')->nullable()->change();
            $table->string('diamond_amount')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
