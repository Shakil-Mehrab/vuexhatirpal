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
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['pending','processing','completed','decline'])->default('pending');
            $table->float('grand_total');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method', ['cash_on_delivery', 'paypal','stripe','card'])->default('cash_on_delivery');

            $table->string('shipping_fullname');
            $table->string('shipping_address');
            $table->bigInteger('city_id');
            $table->bigInteger('country_id');
            $table->bigInteger('deliverybranch_id');
            $table->string('shipping_zipcode');
            $table->string('shipping_phone');
            $table->string('notes')->nullable();

            $table->string('billing_fullname');
            $table->string('billing_address');
            $table->bigInteger('billing_city_id');
            $table->bigInteger('billing_country_id');
            $table->string('billing_zipcode');
            $table->string('billing_phone');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
