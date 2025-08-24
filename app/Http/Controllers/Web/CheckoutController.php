<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\MyCart;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->user()->id;

        $carts = MyCart::where('user_id', $userId)->get();
        $totalAmt = 0;
        $delFee = 45;

        foreach ($carts as $cart) {
            $totalAmt += $cart->qty * $cart->price;
        }

        $data = [
            'order_number' => 'ORD-250824001',
            'user_id' => $userId,
            'address_id' => 1,
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

        return view('web.checkout.index', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
