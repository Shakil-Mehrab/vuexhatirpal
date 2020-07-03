<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand');
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('quantity');
            $table->float('weight');
            $table->float('price');
            $table->string('cover_img')->default('default.jpg');
            $table->float('sale_price');
            $table->boolean('status');
            $table->boolean('featured');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('wishes');
    }
}
