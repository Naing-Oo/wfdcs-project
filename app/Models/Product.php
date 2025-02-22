<?php

namespace App\Models;

class Product extends BaseModal
{

    function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    
}
