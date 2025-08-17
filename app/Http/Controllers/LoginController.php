<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        dd($request->all());

        $redirect = $request->redirect;

        $isExistUser = User::where('email', $request->email)->exists();

        if (!$isExistUser) {

            Session::flash('error', 'Invalid login user!');

            return redirect()->back();
        }

        $isCheck = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$isCheck) {
            Session::flash('error', 'Incorrect password!');

            return redirect()->back();
        }
            
        return redirect($redirect);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
