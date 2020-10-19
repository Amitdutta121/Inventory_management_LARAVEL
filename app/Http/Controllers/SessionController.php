<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    public function addToCart(Request $request)
    {
        if (Product::find($request->input("product_id"))->product_stocks < $request->input("quantity")){
            session()->put("message","false");
            return redirect('/buyProduct');
        }else {
            $cart = $request->session()->get("sellSession");
            if (!$cart) {
                $request->session()->put("sellSession", array([$request->input("product_id"), $request->input("product_name"), $request->input("price"), $request->input("quantity")]));
            } else {
                array_push($cart, [$request->input("product_id"), $request->input("product_name"), $request->input("price"), $request->input("quantity")]);
                $request->session()->put("sellSession", $cart);
            }
            session()->put("message","true");

            return redirect('/buyProduct');
        }

    }
    public function printSession()
    {
        return session()->get("sellSession");
    }
    public function destroySession()
    {
        session()->forget("sellSession");
    }
}
