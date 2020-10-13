<?php

namespace App\Http\Controllers;

use App\Clint;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view("users.users")->with("users",$users);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function addUsers()
    {
        return view("users.addUsers");
    }

    public function deleteUsersRequest(Request $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email  = $request->input("email");
        $user->password  = Hash::make($request->input("password"));
        $user->user_role = $request->input("user_role");
        $user->save();
        return redirect("/showUsers");
    }

    public function editUsers($id)
    {
        $users = User::find($id);
        return view("users.editUsers")->with("editUsers",$users);
    }

    public function updateUsers(Request $request)
    {
        $user = User::find($request->input("id"));
        $user->name = $request->input("name");
        $user->email  = $request->input("email");
        $user->user_role = $request->input("user_role");
        if($request->input("password") != null){
            $user->password = $request->input("password");
        }
        $user->save();
        return redirect("/showUsers");
    }
}
