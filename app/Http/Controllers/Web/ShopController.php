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
        $cart = MyCart::where('user_id', 1)->where('product_id', $id)->first();

        if ($cart) {
            $cart->qty = $request->qty;
            $cart->save();

            return response($this->cartSummary());
        }

        $product = Product::find($id);

        $cart = [
            'user_id' => 1,
            'product_id' => $product->id,
            'qty' => $request->qty,
            'price' => $product->price,
        ];

        MyCart::create($cart);

        return response($this->cartSummary());
    }

    public function shoppingCart()
    {
        $carts = MyCart::with('product')
            ->where('user_id', 1)
            ->get()
            ->map(fn($c) => [
                'id' => $c->id,
                'name' => $c->product->name,
                'image' => $c->product->first_image,
                'price' => $c->price,
                'qty' => $c->qty,
                'total' => $c->qty * $c->price,
            ])->all();

        // dd($carts);

        return view('web.shop.shopping-cart', compact('carts'));
    }

    public function removeCart($id)
    {
        // MyCart::find($id)->delete();

        return response()->json(['message' => 'Remove success', 'id' => $id]);
    }

    private function cartSummary()
    {
        $carts = MyCart::where('user_id', 1)->get();

        $totalQty = 0;
        $totalAmt = 0;

        foreach ($carts as $cart) {
            $totalQty += $cart->qty;
            $totalAmt += $cart->qty * $cart->price;
        }

        return [
            'qty' => $totalQty,
            'amount' => number_format($totalAmt, 2)
        ];
    }
}
