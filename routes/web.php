<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource("Product", "ProductsController");
Route::resource("Clint", "ClientController");
Route::post("addToCart","SessionController@addToCart");
Route::get("/printSession", "SessionController@printSession");MENU
Route::get("/destroySession", "SessionController@destroySession");
Route::get("/checkout", "CheckoutController@checkout");
Route::get("/removeFromSession/{id}", function ($id){
    $data = session()->get("data");
    $newData = array();
    for ($i=0; $i<count($data); $i++){
        if ($i != $id){
            array_push($newData, $data[$i]);
        }
    }
    session()->forget("data");
    session()->put("data", $newData);
    return redirect("/checkout");
});
Route::resource("Sell_records", "CheckoutController");
Route::get("/recentSellProducts", "CheckoutController@checkout");
Route::get("/buyProduct","BuyProductsController@index")->name("buyProductName");

Route::resource("Buy_records", "BuyProductsController");

Route::get("/removeFromSellSession/{id}", function ($id){
    $data = session()->get("sellSession");
    $newData = array();
    for ($i=0; $i<count($data); $i++){
        if ($i != $id){
            array_push($newData, $data[$i]);
        }
    }
    session()->forget("sellSession");
    session()->put("sellSession", $newData);
    return redirect("/buyProduct");
});
Route::post("addToBuySession","BuyProductsController@addToBuySession");
Route::post("addToRawMaterialSession","RawMaterialController@addToRawMaterialSession");

Route::get("/removeRawMaterialSession/{id}", function ($id){
    $data = session()->get("rawMaterialSession");
    $newData = array();
    for ($i=0; $i<count($data); $i++){
        if ($i != $id){
            array_push($newData, $data[$i]);
        }
    }
    session()->forget("rawMaterialSession");
    session()->put("rawMaterialSession", $newData);
    return redirect("/buyProduct");
});
Route::resource("Raw_material_records", "RawMaterialController");
Route::get("/addRawMaterial","RawMaterialController@addRawmaterial")->name("addRawMaterial");
Route::get("/rawMaterial","RawMaterialController@index");

Route::resource("Labor_expense", "LabourExpenseController");
Route::get("/addLabourExpense","LabourExpenseController@addExpense")->name("addLabourExpense");
Route::get("/LabourExpense","LabourExpenseController@index")->name("LabourHome");

Route::get("/report","ReportsController@index")->name("rep");
Route::resource("Lcnumber", "lcnumberController");
Route::get("/addlc","lcnumberController@addLC")->name("addlc");

Route::get("/addCustomerMoney", "ClientController@addMoney")->name("addCustomerMoneyView");
Route::post("/addMoneyToDatabase", "ClientController@addMoneyToDB")->name("addMoneyToDB");

Route::get("/addCompanyMoneyView", "CompanyController@index")->name("addCompanyMoneyView");
Route::post("/addMoneyToCompany", "CompanyController@addMoneyToCompany")->name("addMoneyToCompany");

Route::resource("ExpensesRecord", "ExpensesController");

Route::get("/clientDetails/{id}", "ClientController@clientDetails");
Route::get("/clientDetailsProduct/{id}", "ClientController@clientDetailsProduct");

Route::post("/showReport","ReportsController@showreport");

Route::get("/clientTransistionReport", "ClientController@clientTransitionReport");
Route::get("/companyTransistionReport", "CompanyController@showTransition");

Route::get("/showUsers", "UsersController@index");
Route::post("/deleteUsers/{id}", "UsersController@deleteUser")->name("deleteUser");
Route::get("/addUsers", "UsersController@addUsers")->name("addUsers");
Route::post("/deleteUsersRequest", "UsersController@deleteUsersRequest")->name("deleteUsersRequest");

Route::get("/editUsers/{id}", "UsersController@editUsers");

Route::post("/updateUsers", "UsersController@updateUsers")->name("updateUsers");
