<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('session_id');
            $table->integer('product_id')->unsigned();
            $table->integer('price');
            $table->tinyInteger('quantity');
            $table->json('options');
            $table->string('ip');
            $table->string('user_agent');
            $table->enum('type', ['cart', 'wishlist']);
            $table->timestamps();

            $table->foreign('product_id')
            ->references('product_id')
            ->on('products')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('user_id')
            ->on('users')
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
        Schema::dropIfExists('carts');
    }
}
