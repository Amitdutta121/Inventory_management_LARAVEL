<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_records', function (Blueprint $table) {
            $table->integer('sell_records_id',11);
            $table->string('payment_option',200);
            $table->date('delivery_date');
            $table->string('delivery_man_name',200);
            $table->string('delivery_car_no',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_records');
    }
}
