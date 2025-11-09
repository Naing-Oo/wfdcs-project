<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

        $user = User::create($data);

        Auth::login($user);

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


    // ======== google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $data = [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            // 'google_id' => $googleUser->id,
            // 'avatar' => $googleUser->avatar,
            'email_verified_at' => now(),
            'password' => bcrypt($googleUser->id),
            'gender' => 'm',
            'phone' => '1234567890',
            'birth_date' => now(),
        ];

        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            User::where('email', $googleUser->email)->update($data);
        } else {
            $user = User::create($data);
        }

        Auth::login($user);


        // $user = User::updateOrCreate(
        //     ['email' => $googleUser->getEmail()],
        //     [
        //         'name' => $googleUser->getName(),
        //         'google_id' => $googleUser->getId(),
        //         'avatar' => $googleUser->getAvatar(),
        //         'email_verified_at' => now(),
        //         'password' => bcrypt(str()->random(12)), // random password for first login
        //     ]
        // );

        return redirect()->intended('/');
    }
}
