<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        // Session::flash('success', 'Category created successfully.');

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // dd($request->all());

        if ($request->id) {
            $category = Category::find($request->id);

            if ($request->has('image')) {
                unlink($category->image_url);
            }
        } else {
            $category = new Category();
        }

        $category->name = $request->name;

        if ($request->has('image')) {
            $category->image_url = $this->saveImage($request->file('image'));
        }

        $category->save();

        $action = $request->id ? 'updated' : 'created';

        Session::flash('success', "Category {$action} successfully.");
        
        return redirect()->route('categories.index');
    }

    private function saveImage($file)
    {
        $path = $file->store('category', 'public');

        return 'storage/'.$path;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd('edit', $id);
        $category = Category::find($id)->toArray();

        // dd($category);
        // $catJson = json_encode($category);

        return response()->json($category);
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
        // dd($id);

        $category = Category::find($id);

        if ($category) {

            unlink($category->image_url);
            $category->delete();
        }

        // dd($category);

        return response('Delete successfully');
    }
}
