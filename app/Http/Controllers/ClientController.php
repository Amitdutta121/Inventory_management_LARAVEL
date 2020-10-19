<?php

namespace App\Http\Controllers;

use App\addMoneyRecords;
use App\Create_products_sell_records_all;
use App\Product;
use App\Sell_records;
use Illuminate\Http\Request;
use App\Clint;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clints = Clint::all();
        return view('client.clints')->with('clints', $clints);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.addClient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clint = new Clint();
        $clint->client_name = $request->input("name");
        $clint->client_phoneno = $request->input("phoneno");
        $clint->client_nid = $request->input("nid");
        $clint->client_address = $request->input("address");
        $clint->client_balance = 0;
        $clint->date = date('Y-m-d');
        $clint->save();

        return redirect()->to("/Clint")->with("amessage","1897");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editClint = Clint::find($id);
        return view("client.editClient")->with('editClint', $editClint);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clint = Clint::find($id);
        $clint->client_name = $request->input("name");
        $clint->client_phoneno = $request->input("phoneno");
        $clint->client_nid = $request->input("nid");
        $clint->client_address = $request->input("address");
        $clint->client_balance = $request->input("balance");
        $clint->date = date('Y-m-d');
        $clint->save();



        return redirect('/Clint');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clint = Clint::find($id);
        $clint->delete();
        return redirect()->to("/Clint")->with("adelete","1897");
    }
    public function addMoney(){
        $client = Clint::all();
        return view("client.addMoney")->with("client", $client);
    }
    public function addMoneyToDB(Request $request){

        $client = Clint::find($request->input("cnumber"));
        $client->client_balance = $client->client_balance + $request->input("amount");
        $client->save();

        $records = new addMoneyRecords();
        $records->user_adder_id = auth()->user()->id;
        $records->money_type = $request->input("mtype");
        $records->recived_user_id = $request->input("cnumber");
        $records->bank_name = $request->input("bname");
        $records->amount = $request->input("amount");
        $records->notes = $request->input("notes");
        $records->date = date('Y-m-d');
        $records->save();


        return redirect("/Clint");
    }

    public function clientDetails($id)
    {

        $total = [];
        $products  = [];
        $product_name  = [];
        $sell_records = Sell_records::where("customer_id",$id)->orderBy('date', 'desc')->get();
        for ($i=0; $i<count($sell_records); $i++){
            $createSellRecordsProducts = Create_products_sell_records_all::where("sell_records_id",$sell_records[$i]->sell_records_id)->get();
            $subtotal = 0;
            foreach ($createSellRecordsProducts as $product){
                $subtotal = $subtotal + ($product->products_quantity * $product->product_price);
                array_push($product_name, Product::find($product->products_id)->product_name);
            }
            array_push($total, $subtotal);
            array_push($products, $createSellRecordsProducts);
        }

        return view("client.clientDetails")
                ->with("sell_records",$sell_records)
                ->with("total",$total)
                ->with("products", $products);
    }

    public function clientDetailsProduct($id)
    {
        $details = Sell_records::find($id);
        $product_names = [];
        $createSellRecordsProducts = Create_products_sell_records_all::where("sell_records_id",$id)->get();

        foreach ($createSellRecordsProducts as $products){
            array_push($product_names, Product::find($products->products_id)->product_name);
        }

        return view("client.showClientProducts")->with("products", $createSellRecordsProducts)->with("productNames", $product_names)->with("details", $details);
    }

    public function clientTransitionReport()
    {
        $addMoneyRecords = addMoneyRecords::all();
        $clientPhoneNo = [];
        $clientName = [];
        foreach ($addMoneyRecords as $moneyRecord){
            $client = Clint::find($moneyRecord->recived_user_id);
            array_push($clientName, $client->client_name);
            array_push($clientPhoneNo, $client->client_phoneno);
        }
        return view("client.clintsTransition")->with("addMoneyRecords",$addMoneyRecords)->with("clientNames",$clientName)->with("phoneno",$clientPhoneNo);
    }

    public static function getName($id) {
        return Product::find($id)->product_name;
    }
}
