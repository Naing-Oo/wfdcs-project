<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\MyCart;
use Carbon\Carbon;

trait OrderTrait
{
    protected function orderDetails($id)
    {
        $order = Order::with('address')->find($id);
        $cart = $this->orderCart($order);

        return [
            'date' => Carbon::parse($order->created_at)->format('d/m/Y H:i'),
            'number' => $order->order_number,
            'customer' => $order->customer->name,
            'address' => $order->address?->full_address,
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
    }

    protected function orderCart($order)
    {
        return MyCart::with('product')->where('order_id', $order->id)->get();
    }
}
