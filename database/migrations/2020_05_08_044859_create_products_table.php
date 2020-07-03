<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand');
            $table->string('sku');
            $table->string('position');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('quantity');
            $table->float('weight');
            $table->float('price');
            $table->string('cover_img')->default('images/default/product/default.jpg');
            $table->float('sale_price');
            $table->boolean('status');
            $table->boolean('featured');
            $table->timestamps();
            $table->bigInteger('view')->default();
            $table->bigInteger('sale_count')->default();
            $table->bigInteger('shop_id')->nullable();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->string('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
