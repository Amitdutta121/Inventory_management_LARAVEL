<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Lcnumber;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lcNumbers = [];
        $products = Product::all();
        for ($i =0; $i<count($products); $i++) {
            $num = Lcnumber::find($products[$i]->product_lc_id);
             array_push($lcNumbers, $num->lc_number);
        }
        return view('product.products')->with('products', $products)->with("lcnumber",$lcNumbers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lc = Lcnumber::all();
        return view('product.addProduct')->with("lcnumbers", $lc);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_lc_id = $request->input("lcnumber");
        $product->product_name = $request->input("name");
        $product->product_code = $request->input("code");
        $product->product_origin = $request->input("origin");
        $product->product_price = $request->input("price");
        $product->product_stocks = $request->input("stock");
        $product->date = date('Y-m-d');
        $product->product_image = "";
        $product->pproduct_description = "";
        $product->save();

        $lc = Lcnumber::find($request->input("lcnumber"));
        $lc->total = $lc->total + $request->input("price");
        $lc->save();

        return redirect('/Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editProduct = Product::find($id);
        $lcnumbers = Lcnumber::All();
        return view('product.editProduct')->with("editProduct", $editProduct)->with("lcnumbers",$lcnumbers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

        $product = Product::find($id);
        $product->product_lc_id = $request->input("lcnumber");
        $product->product_name = $request->input("name");
        $product->product_code = $request->input("code");
        $product->product_origin = $request->input("origin");
        $product->product_price = $request->input("price");
        $product->product_stocks = $request->input("stock");
        $product->save();

        return redirect('/Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::find($id);


        $lcUpdate = Lcnumber::find($product->product_lc_id);
        $lcUpdate->total = $lcUpdate->total - ($product->product_price * $product->product_stocks);
        $lcUpdate->remaining = $lcUpdate->remaining  - ($product->product_price * $product->product_stocks);
        $lcUpdate->save();
        $product->delete();
        return redirect('/Product');
    }
}
