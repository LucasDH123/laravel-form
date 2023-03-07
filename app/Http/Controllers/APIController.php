<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class APIController extends Controller
{
    public function getKeyView(){
        return view('acquire_key');
    }

    public function newKey() {
        if (Auth::check()){
             /** @var \App\Models\MyUserModel $user **/
            $user = Auth::user();

            $token = $user->createToken(Auth::user()->name);
            return Redirect::to('/token')->with('token', $token->plainTextToken);
        }
    
    }
}
