<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('district_id');
            $table->integer('upazila_id');
            $table->integer('shipping_type_id');
            $table->string('emergency_phone')->nullable();
            $table->mediumText('billing_address');
            $table->mediumText('shipping_address')->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('promo_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
