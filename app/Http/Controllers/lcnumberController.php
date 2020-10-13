<?php

namespace App\Http\Controllers;

use App\Clint;
use Illuminate\Http\Request;
use App\Lcnumber;

class lcnumberController extends Controller
{
    public function index()
    {
        $lcnumber = Lcnumber::all();
        return view('lcnumber.LC')->with('lcnumber', $lcnumber);
    }
    public function addLC()
    {
        return view('lcnumber.addLc');
    }
    public function store(Request $request)
    {
        $lcnumber = new Lcnumber();
        $lcnumber->lc_number = $request->input("lcnumber");
        $lcnumber->lc_margin_1_security_money = $request->input("s1");
        $lcnumber->lc_margin_1_bank_charge = $request->input("bankCharge1");
        $lcnumber->lc_margin_2_security_money	 = $request->input("s2");
        $lcnumber->lc_margin_2_bank_charge = $request->input("bankCharge2");
        $lcnumber->lc_insurance_bill = $request->input("insuranceBill");
        $lcnumber->lc_document_bill = $request->input("documentBill");
        $lcnumber->lc_document_name = $request->input("documentNote");
        $lcnumber->lc_duty_free_charge = $request->input("dutyFreeCharge");
        $lcnumber->lc_truck_fair_bill = $request->input("truckFairBill");
        $lcnumber->date = date('Y-m-d');
        $lcnumber->total = $request->input("s1") + $request->input("bankCharge1") +
            $request->input("s2") +$request->input("bankCharge2") +$request->input("insuranceBill") +$request->input("documentBill")+
            $request->input("dutyFreeCharge") + $request->input("truckFairBill");
        $lcnumber->remaining = $request->input("s1") + $request->input("bankCharge1") +
            $request->input("s2") +$request->input("bankCharge2") +$request->input("insuranceBill") +$request->input("documentBill")+
            $request->input("dutyFreeCharge") + $request->input("truckFairBill");
        $lcnumber->already_paid = "0";
        $lcnumber->save();
        return redirect()->to("/Lcnumber")->with("lcmessage", "Lc Number Added");
    }

    public function destroy($id)
    {
        $lcnumber = Lcnumber::find($id);
        $lcnumber->delete();
        return redirect()->to("/Lcnumber")->with("deleteMessage", "Lc Number Deleted");
    }

    public function show($id)
    {
        $lcnumber = Lcnumber::find($id);
        return view("lcnumber.editLc")->with('editLc', $lcnumber);
    }

    public function update(Request $request, $id)
    {
        $lcnumber = Lcnumber::find($id);
        $lcnumber->lc_number = $request->input("lcnumber");
        $lcnumber->lc_margin_1_security_money = $request->input("s1");
        $lcnumber->lc_margin_1_bank_charge = $request->input("bankCharge1");
        $lcnumber->lc_margin_2_security_money	 = $request->input("s2");
        $lcnumber->lc_margin_2_bank_charge = $request->input("bankCharge2");
        $lcnumber->lc_insurance_bill = $request->input("insuranceBill");
        $lcnumber->lc_document_bill = $request->input("documentBill");
        $lcnumber->lc_document_name = $request->input("documentNote");
        $lcnumber->lc_duty_free_charge = $request->input("dutyFreeCharge");
        $lcnumber->lc_truck_fair_bill = $request->input("truckFairBill");
        $lcnumber->save();

        return redirect('/Lcnumber');
    }
}
