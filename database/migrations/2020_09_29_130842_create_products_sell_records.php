<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsSellRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_sell_records', function (Blueprint $table) {
            $table->integer('sell_records_products_id',true);
            $table->integer('sell_records_id',false);
            $table->integer('products_id',false);
            $table->integer('products_quantity',false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_sell_records');
    }
}
