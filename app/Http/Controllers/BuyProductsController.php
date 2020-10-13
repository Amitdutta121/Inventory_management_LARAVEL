<?php

namespace App\Http\Controllers;

use App\Clint;
use App\Lcnumber;
use Illuminate\Http\Request;
use App\Sell_records;
use App\Create_products_sell_records_all;
use App\Product;

class BuyProductsController extends Controller
{
    public function index(){
        $clints = Clint::all();
        $products = Product::all();
        return view("buyProducts.buyProducts")->with("clients",$clints)->with("products",$products);
    }
    public function addToBuySession(Request $request)
    {
        $buySession = $request->session()->get("buySession");
        $name = $request->input("name");
        $origin = $request->input("origin");
        $code = $request->input("code");
        $price = $request->input("price");
        $stock = $request->input("stock");

        if(!$buySession) {
            $request->session()->put("buySession",array([$name,$origin, $code, $price, $stock]));
        }
        else{
            array_push($buySession, [$name,$origin, $code, $price, $stock]);
            $request->session()->put("buySession", $buySession);
        }
        return redirect('/buyProduct');
    }

    public function store(Request $request)
    {
        $sellRecords = new Sell_records();
        $sellRecords->customer_id = $request->input("cnumber");
        $sellRecords->calan_number = $request->input("calannumber");
        $sellRecords->seller_id = auth()->user()->id;
        $sellRecords->date = date('Y-m-d');
        $sellRecords->save();

        $mID = $sellRecords->sell_records_id;
        $sessData = session()->get("sellSession");

        for ($i =0; $i<count($sessData); $i++) {

            $sellRecordsProducts = new Create_products_sell_records_all();
            $sellRecordsProducts->sell_records_id = $mID;
            $sellRecordsProducts->products_id = $sessData[$i][0];
            $sellRecordsProducts->products_quantity = $sessData[$i][3];
            $sellRecordsProducts->product_price = $sessData[$i][2];
            $sellRecordsProducts->save();

            $product = Product::find($sessData[$i][0]);
            $product->product_stocks =  $product->product_stocks - $sessData[$i][0];
            $product->save();

            $total = 0;
            for($i =0; $i<count($sessData); $i++){
                $total = $total + ($sessData[$i][2] * $sessData[$i][3]);
            }
            //decrease money
            $client = Clint::find($request->input("cnumber"));
            $client->client_balance = $client->client_balance - $total;
            $client->save();
        }

        session()->forget("sellSession");
        return redirect("/buyProduct");
    }
}
