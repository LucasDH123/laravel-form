<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    public function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|max:25|unique:users',
            'password' => 'required|min:10|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password']));
        return redirect()->to('login')->withErrors(['msg' => 'User has been created!']);
    }

    public function userLogin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',

        ]);

        $name = $request->name;
        $password = $request->password;

        $user = DB::table('users')->where('name', '=', $name)->first();

        if (empty($user)) {
            return Redirect::back()->with('msg', 'user not found');
        }

        if (Hash::check($password, $user->password)) {
            if (Auth::attempt(['name' => $name, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->to('/');
            } else {
                return Redirect::back()->with('msg', 'user not found');
            }
        } else {
            return Redirect::back()->with('msg', 'password does not match');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->to('/');
    }
}
