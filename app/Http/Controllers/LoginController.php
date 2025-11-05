<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        // user validation
        $isExistUser = User::where('email', $request->email)->exists();

        if (!$isExistUser) {

            $res = [
                "message" => "Invalid login user.",
                "errors" => [
                    "email" => [
                        "Invalid login user."
                    ]
                ]
            ];

            return response()->json($res, 409);
        }

        // password validation
        $isCheck = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$isCheck) {

            $res = [
                "message" => "Incorrect password.",
                "errors" => [
                    "password" => [
                        "Incorrect password."
                    ]
                ]
            ];

            return response()->json($res, 409);
        }

        // success
        $redirect = $request->redirect;

        $res = [
            "message" => "Login successfully.",
            "redirect" => $redirect
        ];

        return response()->json($res, 200);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $data['gender'] = 'f';
        $data['birth_date'] = now();

        User::create($data);

        $res = [
            "message" => "Register successfully.",
            "redirect" => url('/')
        ];

        return response()->json($res, 200);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
