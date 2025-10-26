<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\OrderTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use OrderTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $now = now();
        
        $fromDate = $request->input('fromDate', $now->copy()->addMonths(-1)->startOfMonth()->toDateString()); 
        $toDate = $request->input('toDate', $now->copy()->toDateString()); // Y-m-d

        $orders = Order::whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($o) {

                $cart = $this->orderCart($o);

                return [
                    'id' => $o->id,
                    'number' => $o->order_number,
                    'date' => Carbon::parse($o->created_at)->format('d/m/Y'),
                    'slip' => asset($o->slip),
                    'customer' => $o->customer->name,
                    'tracking' => $o->tracking_number ?? 'Delivery Order',
                    'address' => $o->address?->full_address,
                    'qty' => $cart->sum('qty'),
                    'discount' => number_format($o->coupon_discount, 2),
                    'delivery_fee' => number_format($o->delivery_fee, 2),
                    'amount' => number_format($o->grand_total, 2),
                    'remark' => $o->remark,
                    'status' => $o->status_style,
                    'link' => route('orders.show', $o->id)
                ];
            })->all();

        return view('admin.order.index', compact('orders', 'fromDate', 'toDate'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $res = $this->orderDetails($id);

        return response()->json($res);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status  = $request->status;
        $orderIds = $request->orderIds;

        Order::whereIn('id', $orderIds)->update([
            'status_code' => $status,
        ]);

        return response("Update status to {$status} successfully.");
    }

    
}
