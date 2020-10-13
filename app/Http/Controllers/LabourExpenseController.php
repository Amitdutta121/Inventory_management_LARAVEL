<?php

namespace App\Http\Controllers;

use App\Clint;
use Illuminate\Http\Request;
use App\Labor_expense;

class LabourExpenseController extends Controller
{
    public function index(){
        $labourExpense = Labor_expense::all();
        return view("labour.labourExpense")->with("labourExpense",$labourExpense);
    }

    public function store(Request $request){
        $labourExpense = new Labor_expense();
        $labourExpense->labor_expense_cost = $request->input("cost");
        $labourExpense->labor_expense_other_costs = $request->input("othercost");
        $labourExpense->labor_expense_notes = $request->input("notes");
        $labourExpense->date = date('Y-m-d');
        $labourExpense->save();
        return redirect("/LabourExpense");
    }
    public function addExpense(){
        return view("labour.addLabourExpense");
    }
    public function destroy($id)
    {
        $lab = Labor_expense::find($id);
        $lab->delete();
        return redirect('/LabourExpense');
    }
    public function update(Request $request, $id)
    {
        $labourExpense = Labor_expense::find($id);
        $labourExpense->labor_expense_cost = $request->input("cost");
        $labourExpense->labor_expense_other_costs = $request->input("othercosts");
        $labourExpense->labor_expense_notes = $request->input("notes");
        $labourExpense->save();
        return redirect("/LabourExpense");
    }
    public function show($id)
    {
        $labourExpense = Labor_expense::find($id);
        return view("labour.editLabourExpense")->with("labourExpense",$labourExpense);
    }


}
