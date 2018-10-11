<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('product_id');
            $table->string('name');
            $table->char('sku', 100)->unique();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->integer('regular_price')->default(0);
            $table->integer('sale_price')->default(0);
            $table->tinyInteger('stock')->default(0);
            $table->enum('is_sale', ['true', 'false'])->default('false');
            $table->enum('in_stock', ['true', 'false'])->default('false');
            $table->enum('status', ['active', 'hide'])->default('hide');
            $table->tinyInteger('use_review')->default(0);
            $table->integer('category_id')->unsigned();
            $table->timestamps();
  

            $table->foreign('category_id')
                ->references('category_id')
                ->on('categories')
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
        Schema::dropIfExists('products');
    }
}
