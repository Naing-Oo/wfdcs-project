<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::with('product')->get();

        // dd($promotions);

        return view('admin.promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();

        return view('admin.promotion.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $v = Validator::make($request->all(), [
            'product_id' => 'required',
            'discount' => 'required',
            'price' => 'required',
        ]);
        if ($v->fails()) {

            Session::flash('error', 'Invalid data');

            return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }

        $data = $request->all();
        // $data['image_url'] = null;

        // save image
        if ($request->has('image')) {
            $data['image_url'] = $this->saveImage($request->file('image'));
        }

        // dd($data);

        Promotion::create($data);

        Session::flash('success', 'Created successfully.');

        return redirect()->route('promotions.index');
    }

    private function saveImage($file)
    {
        $path = $file->store('promotion', 'public');

        return 'storage/'.$path;
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
        $promotion = Promotion::where('id', $id)->first();
        $products = Product::get();

        return view('admin.promotion.edit', compact('promotion','products'));
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
