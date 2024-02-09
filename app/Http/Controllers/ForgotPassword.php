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
      Mail::send("emails.forget_password",['token'=>$token], function ($message) use ($request){
$message->to($request->email);
$message->subject("Reset password");
      });
      return redirect()->to(route("forget_password"))
      ->with("success","we have send an email to reset password .");
    }
    function resetPassword($token){
return view ("new-password" , compact('token'));
    }
    function resetPasswordPost(request $request){
$request->validate([
  "email"=>"required|email|exists:uers",
  "password"=>"required|string|min:6|confirmed",
  "password_confirmation"=>"required",
]);
$updatePassword = DB::table('password_resets')
->where([
  "email"=>$request->email,
  "token"=>$request->token
])->first();
if(!$updatePassword){
  return redirect()->to(route("reset.password"))->with("error","Invalid");
}
}
  }

