<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $isCheck = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($isCheck) return redirect('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
