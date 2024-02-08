<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPassword extends Controller
{
    function forgotPassword(){
        return view('forgotPassword');
    }
    function ForgotPasswordPost(Request $request){
        $request->validate([
        'email'=> "required|email|exists:users",
        ]);
      $token=Str::random(64);  
    }
}
