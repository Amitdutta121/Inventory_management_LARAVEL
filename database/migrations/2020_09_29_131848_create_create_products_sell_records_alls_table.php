<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateProductsSellRecordsAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_products_sell_records_alls', function (Blueprint $table) {
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
        Schema::dropIfExists('create_products_sell_records_alls');
    }
}
