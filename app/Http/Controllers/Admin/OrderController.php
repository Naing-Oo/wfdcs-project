<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MyCart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('order_number', 'desc')
            ->get()
            ->map(function ($o) {

                $cart = $this->orderCart($o);

                return [
                    'number' => $o->order_number,
                    'slip' => $o->slip,
                    'customer' => $o->customer->name,
                    'tracking' => $o->tracking_number ?? 'Delivery Order',
                    'address' => $o->address_id,
                    'qty' => $cart->sum('qty'),
                    'discount' => number_format($o->coupon_discount, 2),
                    'delivery_fee' => number_format($o->delivery_fee, 2),
                    'amount' => number_format($o->grand_total, 2),
                    'remark' => $o->remark,
                    'status' => $o->status_style,
                ];
            })->all();

        // dd($orders);

        return view('admin.order.index', compact('orders'));
    }

    private function orderCart($order)
    {
        return MyCart::where('order_id', $order->id)->get();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
