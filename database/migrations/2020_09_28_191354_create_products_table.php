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
            $table->integer('product_id',11);
            $table->string('product_name',200);
            $table->string('product_code',200);
            $table->string('product_origin',200);
            $table->string('product_price',200);
            $table->string('product_stocks',200);
            $table->string('product_image',200);
            $table->string('pproduct_description',500);
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
