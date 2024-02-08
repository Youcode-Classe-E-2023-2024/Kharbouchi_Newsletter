<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function resetAdminPassword()
    {
        $user = User::where('email', 'admin@example.com')->first(); // Utilisez l'adresse e-mail réelle de l'admin
        if ($user) {
            $user->password = Hash::make('nouveau_mot_de_passe'); // Définissez le nouveau mot de passe
            $user->save();
            return "Le mot de passe de l'administrateur a été réinitialisé avec succès.";
        } else {
            return "L'utilisateur administrateur n'a pas été trouvé.";
        }
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
