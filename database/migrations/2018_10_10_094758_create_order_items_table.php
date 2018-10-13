<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('price');
            $table->tinyInteger('quantity');
            $table->integer('discount')->default(0);
            $table->integer('total');
            $table->text('notes');
            $table->timestamps();

            $table->foreign('order_id')
            ->references('order_id')
            ->on('orders')
            ->onDelete('cascade');

            $table->foreign('product_id')
            ->references('product_id')
            ->on('products')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
