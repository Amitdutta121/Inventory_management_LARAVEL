<?php

namespace App\Http\Controllers;

use App\Clint;
use App\Company;
use App\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $role = User::find(Auth::id())->user_role;
            session()->put("user_role", $role);
            $company =  Company::find(1);
            $users = User::all();
            $customer =Clint::all();
            return view('home')->with("balance", $company->balance)->with("userCount",count($users))->with("clientCount",count($customer));
        }
        return view('auth.register');
    }
}
