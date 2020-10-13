<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_records', function (Blueprint $table) {
            $table->integer('buy_record_id',11);
            $table->string('payment_option',200);
            $table->string('lc_approve',200);
            $table->string('duty_payment',200);
            $table->string('bank_payment',200);
            $table->string('bank_payment_notes',200);
            $table->string('other_expenses',200);
            $table->string('other_expenses_note',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_records');
    }
}
