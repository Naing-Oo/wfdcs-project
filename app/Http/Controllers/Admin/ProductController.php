<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * route name -> products.index
     * method: get
     * web -> Route::get('products', [ProductController::class, 'index']);
     */
    public function index()
    {
        $products = Product::with('images', 'category')->get();

        // dd($products);

        // foreach ($products as $key => $p) {
        //     dd($p->first_image, $p->category_name);
        // }

        // return response()->json($products);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * route name -> products.create
     * method: get
     * web -> Route::get('products/create', [ProductController::class, 'create']);
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * route name -> products.store
     * method: post
     * web -> Route::post('products', [ProductController::class, 'store']);
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

        $data = $request->all();
        $data['created_by'] = 'SYS';
        $data['price'] = $data['price'] - $data['discount'];
        $data['description'] = isset($data['description']) 
                            ? $data['description'] 
                            : $data['name'];

        // set data
        $product = Product::create($data);

        // manage image
        $images = $request->images;

        if ($images) {
            $this->saveImages($images, $product->id);
        }

        Session::flash('success', 'Created successfully.');

        return redirect()->route('products.index');
    }

    private function saveImages(array $images, $id)
    {
        foreach ($images as $key => $img) {
            $path = $img->store('product', 'public');

            $prdImg = new ProductImage();

            $prdImg->id = $id;
            $prdImg->line_item_no = $key + 1;   
            $prdImg->image_url = 'storage/' . $path;
            $prdImg->save();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * route name -> (products.edit, $id)
     * method: get
     * web -> Route::get('products/{product}/edit', [ProductController::class, 'edit']);
     */
    public function edit(string $id)
    {
        // get data
        $product = Product::with('images')->find($id);
        $categories = Category::get();

        // dd($product->images->toArray());
        // dd($product->category->name);

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * route name -> (products.update, $id)
     * meethod: put,push
     * web -> Route::put('products/{product}', [ProductController::class, 'update']);
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

        $data = $request->all();

        $product = Product::find($id)->update($data);

        // manage image
        $images = $request->images;

        if ($images) {
            $this->saveImages($images, $product->id);
        }

        Session::flash('success', 'Updated successfully.');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     * route name -> (products.destroy, $id)
     * method: delete
     * web -> Route::delete('products/{product}', [ProductController::class, 'destroy']);
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
        }

        return response('Delete successfully');
    }

    /**
     * remove old image
     */
    public function removeImage(Request $request)
    {
        if ($request->image_url) {
            unlink($request->image_url);
        }

        ProductImage::where([
            'id' => $request->id,
            'line_item_no' => $request->line_item_no
        ])->delete();

        return response('Remove image successfully.');
    }
}
