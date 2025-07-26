<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'qty',
        'price',
        'is_cart',
        'is_active',
    ];
}
