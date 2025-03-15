<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * R
     * FIRST INITIALIZATION
     * Route::get('user/index', [UserController::class, 'index']);
     * url('/user/index')
     * @method get
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->get(); // model
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * C
     * CLICK NEW USER BUTTON
     * Route::get('user/create', [UserController::class, 'create']);
     * url('/user/create')
     * @method get
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     * C
     * CLICK SUBMIT BUTTON ON CREATE FORM
     * Route::post('user/store', [UserController::class, 'store']);
     * url('/user/store')
     * @method post
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:100',
                'gender' => 'required|max:1',
                'birth_date' => 'required|max:20',
                'email' => 'required|email|unique:users|max:50',
                'phone' => 'required|max:20',
                'password' => 'required|confirmed|min:8',
                'other' => 'required_if:gender,o|string|nullable',
            ],
            [
                'name.required' => 'အမည်ထည့်ပါ',
                'name.max' => 'စာလုံး အလုံး ၁၀၀ သာလက်ခံသည်',
                
                'gender.required' => 'ကျားမသတ်မှတ်ပါ',
                'gender.max' => 'စာလုံး အလုံး ၁ သာလက်ခံသည်',
                'other.required_if' => 'LGBTQ သတ်မှတ်ပါ',

                'birth_date.required' => 'မွေးနေ့ထည့်ပါ',
                'birth_date.max' => 'စာလုံး အလုံး ၂၀ သာလက်ခံသည်',
                
                'email.required' => 'အီးမေးလ်ထည့်ပါ',
                'email.email' => 'အီးမေးလ်ပုံစံမမှန်ပါ',
                'email.unique' => 'ဒီအီးမေးလ် သုံးပြီးသားဖြစ်သည် တခြားအီးမေးလ်ထည့်ပါ',
                'email.max' => 'စာလုံး အလုံး ၅၀ သာလက်ခံသည်',

                'phone.required' => 'ဖုန်းနံပါတ်ထည့်ပါ',
                'phone.max' => 'စာလုံး အလုံး ၂၀ သာလက်ခံသည်',

                'password.required' => 'နာမည်ထည့်ပါ',
                'password.min' => 'အနည်းဆုံး ၈ လုံးဖြစ်ရမည်',
                'password.confirmed' => 'လျှို့ဝှက်နံပါတ်မမှန်ပါ',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->other = $request->other;

        $user->save();

        Session::flash('success', 'Created user successfully.');

        // $url = url('user/index');
        // $url = url('user/show/'. $user->id);
        // $url = url("user/{$user->id}/edit");
        // $url = route('user.edit', $user->id);

        $url = route('user.index');
        // url("user/{$user->id}/edit");
        // route('user.edit', $user->id);

        return redirect($url);
    }

    /**
     * Display the specified resource.
     * R
     * CLICK VIEW BUTTON
     * Route::get('user/details/{id}', [UserController::class, 'show']);
     * url('/user/details/1')
     * @method get
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('user.details', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * R
     * CLICK EDIT BUTTON
     * Route::get('user/edit/{id}', [UserController::class, 'edit']);
     * url('/user/edit/1')
     * @method get
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * U
     * CLICK SUBMIT BUTTON ON EDIT FORM
     * Route::put('user/update/{id}', [UserController::class, 'update']);
     * url('/user/update/1')
     * @method put
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($id)
                ],
                'name' => 'required|string|max:100',
                'gender' => 'required|max:1',
                'birth_date' => 'required|max:20',
                'phone' => 'required|max:20',
                'password' => 'required|confirmed|min:8',
                'other' => 'required_if:gender,o|string|nullable',
            ],
            [
                'name.required' => 'အမည်ထည့်ပါ',
                'name.max' => 'စာလုံး အလုံး ၁၀၀ သာလက်ခံသည်',
                
                'gender.required' => 'ကျားမသတ်မှတ်ပါ',
                'gender.max' => 'စာလုံး အလုံး ၁ သာလက်ခံသည်',
                'other.required_if' => 'LGBTQ သတ်မှတ်ပါ',

                'birth_date.required' => 'မွေးနေ့ထည့်ပါ',
                'birth_date.max' => 'စာလုံး အလုံး ၂၀ သာလက်ခံသည်',
                
                'email.required' => 'အီးမေးလ်ထည့်ပါ',
                'email.email' => 'အီးမေးလ်ပုံစံမမှန်ပါ',
                'email.unique' => 'ဒီအီးမေးလ် သုံးပြီးသားဖြစ်သည် တခြားအီးမေးလ်ထည့်ပါ',
                'email.max' => 'စာလုံး အလုံး ၅၀ သာလက်ခံသည်',

                'phone.required' => 'ဖုန်းနံပါတ်ထည့်ပါ',
                'phone.max' => 'စာလုံး အလုံး ၂၀ သာလက်ခံသည်',

                'password.required' => 'နာမည်ထည့်ပါ',
                'password.min' => 'အနည်းဆုံး ၈ လုံးဖြစ်ရမည်',
                'password.confirmed' => 'လျှို့ဝှက်နံပါတ်မမှန်ပါ',
            ]
        );

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->other = $request->other;

        $user->updated_at = now();
        $user->save();

        Session::flash('success', 'Updated user successfully.');

        $url = url('user/index');
        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     * D
     * CLICK DELETE BUTTON
     * Route::delete('user/destroy/{id}', [UserController::class, 'destroy']);
     * url('/user/destroy/1')
     * @method delete
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            $user->delete();
        }

        Session::flash('delete', 'Deleted user successfully.');

        return response('delete successfully.');

        // return redirect($url);
    }
}
