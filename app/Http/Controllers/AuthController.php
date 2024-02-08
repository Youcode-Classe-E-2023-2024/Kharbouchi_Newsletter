<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth/register');
    }
public function registerPost(Request $request)
{


    $user = new User();
    
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    
    $user->save();
    return back()->with('succes','Register successfully');

}

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
    
        return back()->with('error', 'Imad');
    }
}
