<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());

        $isCheck = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // dd($isCheck);

        Auth::check();

        if ($isCheck) return redirect('/');

        // return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
