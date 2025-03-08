<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        dd($request->all());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;

        $user->save();

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        // dd($validator);

        if ($validator->fails()) {

            dd('error');

            // return response()->json(['errors' => $validator->errors()], 409);
        }

        dd('success');

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->updated_at = now();

        $user->save();
        
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
        
        return response('delete successfully.');

        // return redirect($url);
    }
}
