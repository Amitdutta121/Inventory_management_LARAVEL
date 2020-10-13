<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLcnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lcnumbers', function (Blueprint $table) {
            $table->integer('lc_id',100);
            $table->string('lc_margin_1_security_money',200);
            $table->string('lc_margin_1_bank_charge',200);
            $table->string('lc_margin_2_security_money',200);
            $table->string('lc_margin_2_bank_charge',200);
            $table->string('lc_insurance_bill',200);
            $table->string('lc_document_bill',200);
            $table->string('lc_document_name',200);
            $table->string('lc_duty_free_charge',200);
            $table->string('lc_truck_fair_bill',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lcnumbers');
    }
}
