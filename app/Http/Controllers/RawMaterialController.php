<?php

namespace App\Http\Controllers;

use App\Buy_records;
use App\Create_products_buy_records_all;
use App\Product;
use Illuminate\Http\Request;
use App\Raw_material;
use App\Raw_material_records;

class RawMaterialController extends Controller
{
    public function index(){
        $rawMaterialData = Raw_material::all();
        return view("rawmaterial.rawMaterial")->with("rawMaterialData",$rawMaterialData);
    }
    public function addRawmaterial(){
        return view("rawmaterial.addRawMaterial");
    }
    public function addToRawMaterialSession(Request $request)
    {
        $buySession = $request->session()->get("rawMaterialSession");
        $name = $request->input("name");
        $price = $request->input("cost");
        $quantity = $request->input("quantity");

        if(!$buySession) {
            $request->session()->put("rawMaterialSession",array([$name,$price, $quantity]));
        }
        else{
            array_push($buySession, [$name,$price, $quantity]);
            $request->session()->put("rawMaterialSession", $buySession);
        }
        return redirect('/rawMaterial');
    }
    public function store(Request $request)
    {
        $rawMaterialRecords = new Raw_material_records();
        $rawMaterialRecords->raw_material_records_total_cost = $request->input("totalCost");
        $rawMaterialRecords->raw_material_records_transportation_cost = $request->input("transCost");
        $rawMaterialRecords->date = date('Y-m-d');
        $rawMaterialRecords->save();

        $mID = $rawMaterialRecords->raw_material_records_id;
        $sessData = session()->get("rawMaterialSession");

        for ($i =0; $i<count($sessData); $i++) {
            $rawMaterial = new Raw_material();
            $rawMaterial->raw_material_records_id = $mID;
            $rawMaterial->raw_material_name = $sessData[$i][0];
            $rawMaterial->raw_material_cost = $sessData[$i][1];
            $rawMaterial->raw_material_quantity = $sessData[$i][2];
            $rawMaterial->save();
        }

        session()->forget("rawMaterialSession");
        return redirect("/rawMaterial");
    }
    public function destroy($id)
    {
        $product = Raw_material::find($id);
        $product->delete();
        return redirect('/rawMaterial');
    }
    public function show($id)
    {
        $editRawMaterial = Raw_material::find($id);
        return view('rawmaterial.editRawMaterial')->with("editRawMaterial", $editRawMaterial);
    }

    public function update(Request $request, $id)
    {

        $product = Raw_material::find($id);
        $product->raw_material_name = $request->input("name");
        $product->raw_material_cost = $request->input("cost");
        $product->raw_material_quantity = $request->input("quantity");
        $product->save();

        return redirect('/rawMaterial');
    }
}
