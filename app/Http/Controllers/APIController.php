<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class APIController extends Controller
{
    public function getKeyView()
    {
        //the give null is to stop an error from occuring on the view, have yet to 
        //find a better solution, so keeping it like this until better option is found.
        return view('acquire_key')->with('token', null);
    }

    public function newKey()
    {
        

        if (Auth::check()) {
            /** @var \App\Models\MyUserModel $user **/
            $user = Auth::user();
            if(auth('sanctum')->check()){
                $user->tokens()->delete();
            }
        
            $token = $user->createToken(Auth::user()->name);
            // echo "<pre>";
            // \var_dump($token->plainTextToken);
            return view('acquire_key')->with('token', $token->plainTextToken);
        }
    }
    public function invalidateKey()
    {
        if (Auth::check()) {
            /** @var \App\Models\MyUserModel $user **/
            $user = Auth::user();
            $user->tokens()->delete();
            return Redirect::to('/token');
        }
    }
}
