<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function view(){
        return view('accountMenu');
    }

    public function dataview()
    {
        $users = User::all();

        if (Auth::user()->is_admin == 1)
        {
            return view('accountDetail')->with('users', $users);
        }
    }

    public function editAccountInfo(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|max:25|unique:users',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::where('id', $request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return Redirect::to('/user_details')->with('msg', "Account details have been updated!");
    }
}
