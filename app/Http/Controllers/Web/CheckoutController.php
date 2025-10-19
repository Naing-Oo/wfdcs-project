<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\MyCart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $addressId = $this->populateAddress($request);

        $userId = auth()->user()->id;

        $carts = MyCart::where('user_id', $userId)
            ->where('order_id', 0)
            ->get();

        if (count($carts) === 0) {

            Session::flash('error', 'Invalid order item. Please shopping before checkout!');

            return redirect(url('shop'));
        }

        $totalAmt = 0;
        $delFee = 45;

        foreach ($carts as $cart) {
            $totalAmt += $cart->qty * $cart->price;
        }

        $prefix = 'OR';
        $yearMonth = now()->format('Ym');
        $numbers = range(0, 9);          // numbers from 0–9
        shuffle($numbers);               // shuffle the array
        $result = array_slice($numbers, 0, 5); // take first 5
        $running = implode($result);

        $data = [
            'order_number' => "{$prefix}-{$yearMonth}-{$running}",
            'user_id' => $userId,
            'address_id' => $addressId,
            'delivery_fee' => $delFee,
            'sub_total' => $totalAmt,
            'grand_total' => $totalAmt + $delFee,
            'status_code' => 'pending',
        ];

        $order = Order::where('order_number', $data['order_number'])->first();

        if ($order) {
            $order->update($data);
        } else {
            $order = Order::create($data);
        }

        foreach ($carts as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }

        return view('web.checkout.index', compact('order'));
    }

    public function edit(string $id)
    {
        $order = Order::find($id);

        if (!$order)
            abort(404);

        return view('web.checkout.index', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $file = $request->file('slip');
        $fileName = $order->order_number . '-' . $file->getClientOriginalName();
        $dir = 'admin/order';

        $file->move($dir, $fileName);

        $path = "{$dir}/{$fileName}";

        $order->slip = $path;
        $order->status_code = 'paid';
        $order->save();

        return redirect('/shop');
    }


    private function populateAddress($request): int
    {
        $data = $request->all();

        $userId = auth()->user()->id;

        $data['user_id'] = $userId;

        $address = Address::where('user_id', $userId)
            ->where('province_id', $request->province_id)
            ->where('district_id', $request->district_id)
            ->where('sub_district_id', $request->sub_district_id)
            ->first();

        if ($address) {
            $address->update($data);
        } else {
            $address = Address::create($data);
        }

        return $address->id;
    }
}
