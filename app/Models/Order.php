<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'tracking_number',
        'user_id',
        'address_id',
        'delivery_fee',
        'coupon_discount',
        'sub_total',
        'grand_total',
        'remark',
        'status_code',
        'payment_method',
        'slip',
        'is_active',
    ];
}
