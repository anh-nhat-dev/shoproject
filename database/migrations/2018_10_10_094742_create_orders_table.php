<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('order_id');
            $table->integer('user_id')->unsigned();
            $table->string('bill_name');
            $table->string('bill_adress');
            $table->string('bill_email');
            $table->string('bill_phone');
            $table->string('payment_method');
            $table->integer('total_price');
            $table->integer('total_discount');
            $table->integer('total');
            $table->enum('status', ['completed','canceled', 'pending', 'processing', 'shipping'])->default('pending');
            $table->string('ip');
            $table->string('user_agent');
            $table->timestamps();

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
        Schema::dropIfExists('orders');
    }
}
