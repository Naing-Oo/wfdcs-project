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

    // get(field_name)Attribute = status_style
    public function getStatusStyleAttribute()
    {
        $bg = '';
        $color = 'white';

        switch ($this->status_code) {
            case 'paid':
                $bg = 'primary';
                break;
            case 'approved':
                $bg = 'success';
                break;
            case 'shipping':
                $bg = 'info';
                break;
            case 'shipped':
                $bg = 'info';
                break;
            case 'received':
                $bg = 'success';
                break;
            case 'cancel':
                $bg = 'danger';
                break;
            default:
                $bg = 'warning';
                break;
        }

        return sprintf('<span class="badge bg-%s text-%s">%s</span>', $bg, $color, ucfirst($this->status_code));
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
