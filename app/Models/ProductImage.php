<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
}



/**
 * create table product_images
 * create migration -> create_product_images_table
 * create model -> ProductImage
 * save image at ProductController@store
 * create images relations in Model/Product
 * call images relations in tController@index
 * use images->first() at index.blade.php / routes/web.php -> /shops
 * 
 */