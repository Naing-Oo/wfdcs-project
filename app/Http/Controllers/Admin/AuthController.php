<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin/dashboard');
        }

        return view('admin.auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }

}
