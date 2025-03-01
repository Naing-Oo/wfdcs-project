<?php

namespace App\Models;

use App\Traits\Utilities;

class Product extends BaseModal
{
    use Utilities;

    function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function qtyOfProduct($code): string
    {
        $product = $this->getProduct($code);

        // return $this->returnMessage($product->name, $product->qty);
        return self::MESSAGE;
    }

    private function getProduct($code)
    {
        return Product::where('code', $code)->first();
    }

    
}
