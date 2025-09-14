<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'province_id',
        'district_id',
        'sub_district_id',
        'postcode',
        'is_default',
    ];
}
