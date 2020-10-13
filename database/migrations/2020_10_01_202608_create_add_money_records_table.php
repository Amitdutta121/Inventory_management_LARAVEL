<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddMoneyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_money_records', function (Blueprint $table) {
            $table->integer('add_money_record_id',100);
            $table->string('user_adder_id',200);
            $table->string('money_type',200);
            $table->string('amount',200);
            $table->string('date',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_money_records');
    }
}
