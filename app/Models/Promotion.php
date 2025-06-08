<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    // properties
    // methods

    protected $fillable = [
        'product_id',
        'description',
        'discount',
        'price',
        'effective_date',
        'expired_date',
        'image_url',
        'created_by',
        'updated_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // image_full_url
    public function getImageFullUrlAttribute()
    {
        if ($this->image_url) // true,false
            return asset($this->image_url);
        
        return asset('admin/img/No_Image_Available.jpg');
    }
}
