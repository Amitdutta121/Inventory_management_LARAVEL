<?php

namespace App\Http\Controllers;

use App\addMoneyRecords;
use App\Clint;
use App\Company;
use App\CompanyBalanceRecords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        return view("company.addMoneyCompany");
    }
    public function addMoneyToCompany(Request $request)
    {
        $company = Company::find(1);
        $company->balance = $company->balance + $request->input("amount");
        $company->save();

        $records = new CompanyBalanceRecords();
        $records->user_adder_id = auth()->user()->id;
        $records->money_type = $request->input("mtype");
        $records->bank_name = $request->input("bname");
        $records->amount = $request->input("amount");
        $records->notes = $request->input("notes");
        $records->date = date('Y-m-d');
        $records->save();
        return redirect()->to("/home")->with("amessage","181" );
    }

    public function showTransition()
    {
        $username = [];
        $addMoneyRecords = CompanyBalanceRecords::all();

        foreach ($addMoneyRecords as $moneyRecord){
            $user = DB::table('users')->where('id', $moneyRecord->user_adder_id)->get();
            array_push($username, $user[0]->name);
        }

        return view("company.companyTransition")->with("addMoneyRecords", $addMoneyRecords)->with("username", $username);
    }
}
