<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;

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

      DB::table('password_reset_tokens')->insert([
        'email'=>$request->email,
        'token'=>$token,
        'created_at'=>Carbon::new()
      ]);
      Mail::send("emails.forget_password",['token'=>$token])
    }
    function resetPassword(){

    }
}
