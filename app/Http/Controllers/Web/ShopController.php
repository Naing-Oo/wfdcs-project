<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\MyCart;


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

    // add to card
    public function update(Request $request, $id)
    {
        // dd($id, $request->qty);

        $product = Product::find($id);

        // dd($product);

        $cart = [
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'qty' => $request->qty,
            'price' => $product->price,
        ];

        // dd($cart);

        $mycart = MyCart::create($cart);

        return response()->json($mycart);
        
    }
}
