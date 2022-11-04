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
            $table->enum('status', ['pending', 'revision', 'canceled', 'delivered'])->default('pending');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('package_id');
            $table->string('revisions');
            $table->dateTime('orginial_delivery_time');
            $table->dateTime('extended_delivery_time');

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('service_packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('orders_services')) {
            Schema::table('orders_services', function (Blueprint $table) {
                $table->dropForeign('orders_services_service_id_foreign');
                $table->dropColumn('service_id');
                $table->dropForeign('orders_services_package_id_foreign');
                $table->dropColumn('package_id');
            });
            Schema::dropIfExists('orders_services');
        }
    }
};