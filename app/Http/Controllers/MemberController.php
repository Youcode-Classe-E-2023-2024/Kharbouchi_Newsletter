<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:members,email', 
        ]);

        $member = new Member();
        $member->email = $request->email;
        $member->subscribe = true; 
        $member->save();

        return back()->with('success', 'You have successfully subscribed!');
    }
}

