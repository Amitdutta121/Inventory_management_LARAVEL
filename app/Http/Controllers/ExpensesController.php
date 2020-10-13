<?php

namespace App\Http\Controllers;

use App\Company;
use App\ExpensesRecord;
use App\Lcnumber;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $lcnumbers = Lcnumber::all();
        return view("expenses.addExpenses")->with("lcnumbers",$lcnumbers);
    }

    public function store(Request $request)
    {
        $lcnumber = "";
        $lcamount = 0;
        $lcost = 0;
        $tcost = 0;
        $ocost = 0;
        $ocostnote = "";

        if($request->input("lcnumber") != null && $request->input("lcamount") != null){
            $lcnumber = $request->input("lcnumber");
            $lcamount = $request->input("lcamount");
        }
        if($request->input("lcost") != null){
            $lcost = $request->input("lcost");
        }
        if($request->input("tcost") != null){
            $tcost = $request->input("tcost");
        }
        if($request->input("ocostnote") != null){
            $ocostnote = $request->input("ocostnote");
        }

        $expense = new ExpensesRecord();
        $expense->lc_id = $lcnumber;
        $expense->lc_amount = $lcamount;
        $expense->labour_cost = $lcost;
        $expense->transportation_cost = $tcost;
        $expense->other_cost = $ocost;
        $expense->other_cost_note = $ocostnote;
        $expense->date = date('Y-m-d');
        $expense->save();

        if($request->input("lcnumber") != null && $request->input("lcamount") != null){
            $lc = Lcnumber::find($request->input("lcnumber"));
            $lc->remaining = $lc->total - ($lc->already_paid+$request->input("lcamount"));
            $lc->already_paid = $lc->already_paid + $request->input("lcamount");
            $lc->save();
        }
        $company = Company::find(1);
        $company->balance = $company->balance-($lcamount +$lcost +
                            $tcost + $ocost);
        $company->save();

        return redirect("/ExpensesRecord");
    }
}
