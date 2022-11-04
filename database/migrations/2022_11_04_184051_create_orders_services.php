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
        Schema::create('orders_services', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0); // 0-pending, 1-revision, 2-canceled, 3-delivered
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('package_id');
            $table->string('revisions');
            $table->dateTime('orginial_delivery_time');
            $table->dateTime('extended_delivery_time');
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
        Schema::dropIfExists('orders_services');
    }
};