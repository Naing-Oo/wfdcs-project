<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\MyCart;
use App\Models\Order;
use App\Models\User;
use App\Traits\OrderTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    use OrderTrait;

    public function manages()
    {
        $user = auth()->user();

        $addresses = Address::where('user_id', $user->id)
            ->where('is_active', true)
            ->get();

        $address = new Address();

        return view('web.account.manage', compact('user', 'addresses', 'address'));
    }

    public function updateAccount(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Check if email is already used by another user
        $isExist = User::where('email', $request->email)
            ->where('id', '!=', $id)
            ->exists();

        if ($isExist) {
            return back()->with('error', 'Email already exists!')->withInput();
        }

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;

        // Only update password if a new one is entered
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Account updated successfully!');
    }



    public function orders()
    {
        $user = auth()->user();

        $orders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($o) {

                return [
                    'id' => $o->id,
                    'number' => $o->order_number,
                    'date' => Carbon::parse($o->created_at)->format('d/m/Y'),
                    'slip' => $o->slip,
                    'customer' => $o->customer->name,
                    'tracking' => $o->tracking_number ?? 'Delivery Order',
                    'address' => $o->address?->full_address,
                    'discount' => number_format($o->coupon_discount, 2),
                    'delivery_fee' => number_format($o->delivery_fee, 2),
                    'amount' => number_format($o->grand_total, 2),
                    'remark' => $o->remark,
                    'status' => $o->status_style,
                    'status_code' => $o->status_code,
                    'link' => route('orders.show', $o->id)
                ];
            })->all();

        // dd($orders);

        return view('web.account.orders', compact('orders'));
    }

    public function order(string $id)
    {
        $res = $this->orderDetails($id);

        return response()->json($res);
    }

    public function getAddress(string $id)
    {
        $model = Address::find($id);

        $res = [
            'id' => $model->id,
            'name' => $model->name,
            'phone' => $model->phone,
            'address' => $model->address,
            'province_id' => $model->province_id,
            'district_id' => $model->district_id,
            'sub_district_id' => $model->sub_district_id,
            'postcode' => $model->postcode,
            'is_default' => $model->is_default,
        ];

        return response()->json($res);
    }

    public function updateAddress(AddressRequest $request)
    {
        $user = auth()->user();

        $data = $request->except('_token', 'id');
        $data['is_active'] = true;
        $data['user_id'] = $user->id;

        if ($request->is_default) {
            Address::where('user_id', $user->id)->update([
                'is_default' => false
            ]);
        }

        if (!$request->id) {
            Address::create($data);
        } else {
            $model = Address::find($request->id);
            $model->update($data);
        }

        return response()->json(['message' => 'success', 'redirect' => route('account.manage')]);
    }

    public function removeAddress(string $id)
    {
        $model = Address::find($id);
        $model->is_active = false;
        $model->save();

        return response()->json(['message' => 'success', 'redirect' => route('account.manage')]);
    }

    private function orderCart($order)
    {
        return MyCart::with('product')->where('order_id', $order->id)->get();
    }
}
