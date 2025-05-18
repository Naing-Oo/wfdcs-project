<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Eloquent ORM (object relation model)

    public function images()
    {
        // array one to many
        return $this->hasMany(ProductImage::class, 'id');
    }

    public function category()
    {
        // one to one
        return $this->belongsTo(Category::class, 'category_id');
    }




    // attribute getFieldNameAttribute first_image
    public function getFirstImageAttribute()
    {
        $images = $this->images;

        if (count($images) === 0)
            return asset('admin/img/No_Image_Available.jpg');

        $image = $images->first();
        return asset($image->image_url);
    }

    // public function getFirstImageAttribute()
    // {
    //     $image = $this->images->first();

    //     return asset($image->image_url ?? 'admin/img/No_Image_Available.jpg');
    // }


    // public function getFirstImageAttribute()
    // {
    //     $images = $this->images;
    //     $url = asset('admin/img/No_Image_Available.jpg'); // default

    //     if (count($images) > 0) {
    //         $image = $images->first();
    //         $url = asset($image->image_url);
    //     }

    //     return '<img src="'.$url.'" alt="" width="100">';
    // }



}
