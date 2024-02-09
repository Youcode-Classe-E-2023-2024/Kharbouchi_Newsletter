<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User; // Assuming you are using the default User model

class forgotPassword extends Controller // Ensure the class name matches the file name
{
    public function forgotPassword()
    {
        return view('forgotPassword');
    }

    public function forgotPasswordPost(Request $request)
    {
    //   Mail::raw('Test email content', function ($message) {
    //     $message->to('kharbouchikhawla603@gmail.com');
    //     $message->subject('Test Email');
    // });
        $request->validate([
            'email' => "required|email|exists:users,email",
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([ // Ensure you're using the correct table name
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        $url = route('reset.password', ['token' => $token]);

        Mail::send('emails.forget_password', ['token' => $token, 'url' => $url], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('forget_password') // Use route() directly for named routes
            ->with('success', 'We have sent an email to reset your password.');
    }

    public function resetPassword($token)
    {
        return view('new-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email,
                              'token' => $request->token
                            ])
                            ->first();
    
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
    
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
    
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
    
        return redirect('/login')->with('success', 'Your password has been changed!');
    }
  }