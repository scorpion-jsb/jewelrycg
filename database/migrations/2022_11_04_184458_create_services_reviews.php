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
        Schema::create('services_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rating')->default(0);
            $table->text('review');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('service_packages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('services_reviews')) {
            Schema::table('services_reviews', function (Blueprint $table) {
                $table->dropForeign('services_reviews_service_id_foreign');
                $table->dropColumn('service_id');
                $table->dropForeign('services_reviews_package_id_foreign');
                $table->dropColumn('package_id');
                $table->dropForeign('services_reviews_user_id_foreign');
                $table->dropColumn('user_id');
            });
            Schema::dropIfExists('services_reviews');
        }
    }
};
