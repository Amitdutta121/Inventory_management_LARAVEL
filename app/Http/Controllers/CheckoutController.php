<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Sell_records;
use App\Create_products_sell_records_all;

class CheckoutController extends Controller
{
    public function index(){
        $totArray = [];
        $sellData = Sell_records::all();
        foreach ($sellData as $sell) {
            $productsData = Create_products_sell_records_all::where('sell_records_id', $sell->sell_records_id)->get();
            $tot = 0;
            foreach ($productsData as $data) {
                $pPrice = Product::find($data->products_id);
                $tot = $tot + ($pPrice->product_price * $data->products_quantity);
            }
            array_push($totArray, $tot);
        }
        return view("checkout.recentSellProducts")->with("sellData",$sellData)->with("totalPrice", $totArray);
    }
    public function checkout(){
        $sessionData = session()->get("data");
        $productName = [];
        $productQuantity = [];
        $pID = [];
        for ($x = 0; $x < count($sessionData); $x++) {
            array_push($productName, Product::find($sessionData[$x][0])->product_name);
            array_push($productQuantity, $sessionData[$x][1]);
            array_push($pID, $sessionData[$x][0]);

        }
        return view("checkout.checkout")->with("pName", $productName)->with("pQuantity", $productQuantity)->with("pid", $pID);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sell_records = new Sell_records();
        $sell_records->payment_option = $request->input("poption");
        $sell_records->	delivery_date = $request->input("date");
        $sell_records->	delivery_man_name = $request->input("name");
        $sell_records->delivery_car_no = $request->input("carno");
        $sell_records->save();

        $mainId = $sell_records->sell_records_id;
        $sessData = session()->get("data");

        for ($i =0; $i<count($sessData); $i++) {
            $sell_products = new Create_products_sell_records_all();
            $sell_products->sell_records_id = $mainId;
            $sell_products->products_id = $sessData[$i][0];
            $sell_products->products_quantity = $sessData[$i][1];
            $sell_products->save();
        }
        session()->forget("data");

        return redirect('/Product');
    }

    public function show($id)
    {
        $allProducts= array();
        $allquantity = array();
        $sellRecords = Sell_records::find($id);
        $productsData = Create_products_sell_records_all::where('sell_records_id', $sellRecords->sell_records_id)->get();
        foreach ($productsData as $data) {
            $p = Product::find($data->products_id);
            array_push($allProducts, $p->product_name);
            array_push($allquantity, $data->products_quantity);

        }

        return view('checkout.showDetailsSellProducts')->with("allProducts", $allProducts)->with("allQuantity", $allquantity);
    }
}
