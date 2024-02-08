<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPassword extends Controller
{
    function forgotPassword(){
        return view('forgotPassword');
    }
}
