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
            $table->integer('status')->default(0); // 0-pending, 1-revision, 2-canceled, 3-(physical:delivered, digital:shipped)
            $table->string('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('package_id');
            $table->string('revisions');
            $table->dateTime('original_delivery_time');
            $table->dateTime('extended_delivery_time');
            $table->string('payment_intent')->default('');
            $table->smallInteger('status_payment')->default(1); // 1: unpaid, 2: paid
            $table->string('status_payment_reason')->default('');
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