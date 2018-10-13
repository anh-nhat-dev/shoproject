<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('sku_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            $table->integer('value_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_id')
            ->references('product_id')
            ->on('products')
            ->onDelete('cascade');

            $table->foreign('sku_id')
            ->references('sku_id')
            ->on('skus')
            ->onDelete('cascade');

            $table->foreign('attribute_id')
            ->references('attribute_id')
            ->on('product_attributes')
            ->onDelete('cascade');

            $table->foreign('value_id')
            ->references('value_id')
            ->on('product_attribute_values')
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
        Schema::dropIfExists('product_variants');
    }
}
