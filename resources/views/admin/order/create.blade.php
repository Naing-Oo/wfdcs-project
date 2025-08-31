@extends('admin.layout.template')

@section('title', 'Product')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            New Product
        </div>

        <div class="card-body">

            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{ old('code') }}">

                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                         <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($categories as $cat)
                                    <option 
                                        value="{{ $cat->id }}" 
                                        @if(old('category_id') == $cat->id) selected @endif>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                             @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                       <div class="col-12 col-md-4">
                         <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                             @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                         <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
                             @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                         <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}">
                             @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" id="discount" name="discount" class="form-control" value="{{ old('discount') }}">
                             @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                         <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" id="qty" name="qty" class="form-control" value="{{ old('qty') }}">
                            @error('qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Images</label>
                            <input type="file" class="form-control" id="image" name="images[]" multiple>
                        </div>
                    </div>

                </div>

                <div class="text-center my-5">
                    <a href="{{ route('products.index') }}" 
                        class="btn btn-outline-secondary px-5">Back</a>
                    <button type="submit" class="btn btn-outline-primary px-5">Save</button>
                </div>

            </form>

        </div>
    </div>
@endsection
