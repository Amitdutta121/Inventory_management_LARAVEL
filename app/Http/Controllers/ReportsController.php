<?php

namespace App\Http\Controllers;

use App\ExpensesRecord;
use App\Lcnumber;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        return view("reports.report");
    }

    public function showreport(Request $request)
    {
            $from = $request->input("startDate");
            $to = $request->input("endDate");
            $expenseRecord = ExpensesRecord::whereBetween("date", [$from, $to])->get();
            $lcNumber = [];

            $subTotal = 0;

            foreach ($expenseRecord as $expense){
                $subTotal = $subTotal + $expense->lc_amount + $expense->labour_cost+$expense->transportation_cost+$expense->other_cost;
                array_push($lcNumber, Lcnumber::find($expense->lc_id)->lc_number);
            }
            return view("reports.showDetailsReport")->with("expenseRecord",$expenseRecord)->with("total",$subTotal)->with("lcNumber",$lcNumber);
    }
}
