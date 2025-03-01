<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('code', 'desc')->get();
        // $products = Product::with('category')->orderBy('code', 'desc')->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = new Product();
        $category = new Category(); // __construct
        // $category->brand = 'MaMa';
        // $category->name = 'Food';

        // dd($category->qtyOfCategory());
        // dd($product->qtyOfProduct('002'));
        
        // dd($product->intro('product', 200), $category->intro('category', 100));

        // dd(Product::MESSAGE);
        // dd(Category::MESSAGE);

        // dd($product->introduce(), $category->introduce());
        dd($product->getFullName('SAW', 'AUNG'));

        // dd($category->checkValidCategory(), $category->name, $category->brandName()); 

        // __destruct
        
        // $message = Session::get('message');
        // dd($message);

        // dd($product->full_name , $category->full_name, $product->phone, $category->category_list);
        // $category->menuName = 'Category';
        // dd($category->menuName);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
