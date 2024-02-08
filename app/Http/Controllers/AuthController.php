<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
            return redirect('/dashboard')->with('success', 'Good job');
        }
    
        return back()->with('error', 'Invalid credentials');
    }
}
