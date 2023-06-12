<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function view()
    {
        return view('accountMenu');
    }

    public function dataview()
    {
        $users = User::all();

        if (Auth::user()->is_admin == 1) {
            return view('accountDetail')->with('users', $users);
        }
    }

    public function editAccountInfo(Request $request)
    {
        $users = User::findOrFail(auth()->id());

        $request->validate([
            'name' => 'required|max:25|unique:users',
            'email' => 'required|email|unique:users',
        ]);


        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();

        return Redirect::to('/user_details')->with('msg', "Account details have been updated!");
    }

    public function editPassword(Request $request) {
        

        $request->validate([
            'new_password' => 'required|min:10|confirmed',
        ]);

        $user = User::findOrFail(auth()->id());
        $request->user()->fill([
            'password' => Hash::make($request->new_password)
        ])->save();
 
        return Redirect::to('/user_details')->with('msg', "Password has been updated!");  
    }
}
