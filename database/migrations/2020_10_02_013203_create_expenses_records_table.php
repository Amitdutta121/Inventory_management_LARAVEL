<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_records', function (Blueprint $table) {
            $table->integer('expenses_records_id',100);
            $table->string('lc_id',200);
            $table->string('lc_amount',200);
            $table->string('labour_cost',200);
            $table->string('transportation_cost',200);
            $table->string('other_cost',200);
            $table->string('other_cost_note',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses_records');
    }
}
