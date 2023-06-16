<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function view()
    {
        return view('userMenu');
    }

    public function dataview()
    {
        $users = User::all();

        if (Auth::user()->is_admin == 1) {
            return view('userDetail')->with('users', $users);
        } else {
            return view("userDetail");
        }
    }

    public function editUserInfoAdminView(Request $request, $id)
    {


        $user = User::findOrFail($id);

        if(Auth::user()->is_admin == 1) {
            return view('admin_edit_user')->with('user', $user);
        } else {
            return Redirect::to('/');
        }
    }

    public function confirmDeletionView(Request $request, $id)
    {
        if(Auth::user()->is_admin == 1 || Auth::user()->id == $id) {

            return view('confirm_user_deletion')->with('id', $id);
        } else {
            return Redirect::to('/');
        }

    }

    public function editUserInfo(Request $request)
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

    public function editPassword(Request $request)
    {


        $request->validate([
            'password' => 'required|confirmed|min:10|string',
        ]);

        $user = User::findOrFail(auth()->id());

        $user->password = $request->password;
        $user->save();

        return Redirect::to('/user_details')->with('msg', "Password has been updated!");
    }

    public function editUserInfoAdminMenu(Request $request)
    {
        if(Auth::user()->is_admin !== 1) {
            return Redirect::to('/');
        }
        $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email',
            'password' => 'confirmed'
        ]);

        $users = User::findOrFail($request->id);

        
     $users->name = $request->name;    
        
        
        $users->email = $request->email;
        
            if(strlen($request->password) >= 10){
                $users->password = $request->password;
            } else {
                Redirect::to('/admin_edit_form/' . $users->id)->with('msg', "password needs to be at least 10 characters");
            }
            
        $users->save();

        return Redirect::to('/user_details')->with('msg', "Account details have been updated!");
    }

    public function deleteUser(Request $request, $id)
    {
        if(Auth::user()->is_admin == 1 || Auth::user()->id == $id ) {

            $user = User::findOrFail($id);

            $user->delete();
    
            return Redirect::to('/user_details')->with('msg', "Account has been deleted");
            
        } else {
            return Redirect::to('/');
        }

       
    }
}
