<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('index');
        $products = Product::get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        // dd($categories);

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'code' => 'required|max:20|unique:products',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required',
            // 'discount' => 'number',
            // 'qty' => 'number',
        ]);

        if ($v->fails()) {
            // dd($validator->errors()->messages());

            Session::flash('error', 'Invalid data');

            return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }

        $product = new Product();

        $product->code = $request->code;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->qty = $request->qty;
        $product->created_by = 'sys'; //Auth::user()->name;
        $product->save();

        Session::flash('success', 'Created successfully.');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::get();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $v = Validator::make($request->all(), [
            'code' => 'required|max:20',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required',
            // 'discount' => 'number',
            // 'qty' => 'number',
        ]);

        if ($v->fails()) {
            // dd($validator->errors());

            Session::flash('error', 'Invalid data');

            return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }

        $product = Product::find($id);

        $product->code = $request->code;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->qty = $request->qty;
        $product->updated_by = 'sys'; //Auth::user()->name;
        $product->save();

        Session::flash('success', 'Updated successfully.');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        
        if ($product) {
            $product->delete();
        }

        return response('Delete successfully');
    }
}
