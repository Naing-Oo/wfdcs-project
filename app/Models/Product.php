<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

// Product::clss derived class of Model::class
class Product extends Model
{

    // custom primary key
    protected $primaryKey = 'id';


    // custom table name
    protected $table = 'products';

    // append additional field to column attribute
    protected $appends = [
        'first_image',
        'category_name'
    ];


    // custom columns
    protected $fillable = [
        'code',
        'category_id',
        'name',
        'description',
        'price',
        'discount',
        'qty',
        'created_by',
        'updated_by',
    ];


    /**
     * Get the user's first name.
     * Eloquent Accessors(get), mutators(set),
     * getter (query/select/fetch data/retrieve data), setter (insert data)
     * 
     * CRUD
     */
    protected function createdBy(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Str::title($value),
            set: fn(string $value) => strtolower($value),
        );
    }



    // Eloquent ORM (object relation model)
    public function images()
    {
        // array one to many
        return $this->hasMany(ProductImage::class, 'id');
    }

    // Eloquent ORM (object relation model)
    public function category()
    {
        // one to one
        return $this->belongsTo(Category::class, 'category_id');
        // left join categories b on a.category_id=b.id;
    }



    /**
     * custom attribute
     * attribute getFieldNameAttribute first_image
     */
    public function getFirstImageAttribute()
    {
        $images = $this->images; // public function images() 2 images

        if (count($images) === 0)
            return asset('admin/img/No_Image_Available.jpg');

        $image = $images->first();
        return asset($image->image_url);
    }

    // CategoryName (category_name)
    public function getCategoryNameAttribute()
    {
        $category = optional($this->category); // public function category()

        if ($category) {
            return "Category {$category->name}";
        }

        return null;
    }
}
