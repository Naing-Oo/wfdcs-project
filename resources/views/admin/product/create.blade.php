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
                            <input type="text" id="code" name="code" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                         <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                       <div class="col-12 col-md-4">
                         <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                         <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                         <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" id="discount" name="discount" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                         <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" id="qty" name="qty" class="form-control">
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
