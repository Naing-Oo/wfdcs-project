<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MyCart;
use App\Models\Order;
use Carbon\Carbon;
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
                    'link' => route('orders.show', $o->id)
                ];
            })->all();

        // dd($orders);

        return view('admin.order.index', compact('orders'));
    }

    private function orderCart($order)
    {
        return MyCart::with('product')->where('order_id', $order->id)->get();
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
        $order = Order::find($id);
        $cart = $this->orderCart($order);

        $res = [
            'date' => Carbon::parse($order->created_at)->format('d/m/Y H:i'),
            'number' => $order->order_number,
            'customer' => $order->customer->name,
            'address' => $order->address_id,
            'discount' => number_format($order->coupon_discount, 2),
            'delivery_fee' => number_format($order->delivery_fee, 2),
            'amount' => number_format($order->grand_total, 2),
            'remark' => $order->remark,
            'items' => $cart->map(function ($c, $index) {
                return [
                    'number' => $index + 1,
                    'product' => $c->product->name,
                    'price' => number_format($c->price, 2),
                    'qty' => number_format($c->qty, 2),
                    'total' => number_format(round($c->price * $c->qty, 2), 2)
                ];
            }),
        ];

        return response()->json($res);
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
