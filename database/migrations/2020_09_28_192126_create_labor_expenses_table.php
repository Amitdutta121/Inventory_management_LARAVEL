<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaborExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labor_expenses', function (Blueprint $table) {
            $table->integer('labor_expense_id',11);
            $table->string('labor_expense_cost',200);
            $table->string('labor_expense_other_costs',200);
            $table->string('labor_expense_notes',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labor_expenses');
    }
}
