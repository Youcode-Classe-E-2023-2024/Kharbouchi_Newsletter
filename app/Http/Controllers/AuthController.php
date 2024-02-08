<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function showRegistrationForm(){
    //     return view('auth/register');
    // }
    // public function register(Request $request)
    // {
    //     $user = new User();
        
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->Role = 'user'; 
        
    //     $user->save();
    //     return back()->with('success','Registered successfully');
    // }
            
            
    public function signin(){
        return view('Auth/signin');
    }
    public function signinPost(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($data)) {
            return redirect('/admin')->with('success', 'Good job');
        }
    
        return back()->with('success', 'email or password not correct');
    }
}
