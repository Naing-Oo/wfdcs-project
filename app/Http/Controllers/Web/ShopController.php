<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promotion;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('images')
            ->get()
            ->map(function ($p) {
                return [
                    'id' => $p->id,
                    'name' => $p->name,
                    'price' => $p->price,
                    'image' => $p->first_image,
                ];
            });

       
        
        $promotions = Promotion::with('product')
            ->get()
            ->map(fn($p) => [
                'id' => $p->id,
                'category' => $p->product->category->name,
                'name' => $p->description,
                'price' => number_format($p->price, 2),
                'discount_amt' => number_format($p->price - (($p->price * $p->discount) / 100), 2),
                'discount' => $p->discount,
                'image' => asset($p->image_url),
            ]);

        
        return view('web.shop.index', [
            'products' => $products,
            'promotions' => $promotions
        ]);
    }

    public function show(string $id)
    {
        $product = Product::with('images')->find($id);

        if (!$product)
            abort(404, "Not found");

        // dd($product->images->pluck('image_url'));

        return view('web.shop.details', compact('product'));
    }
}
