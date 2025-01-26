@extends('layouts.template')

@section('content')
<div class="card border-0 shadow">
    <div class="card-header">
        <h4 class="card-title">Create Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="post">

            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category:</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">Select...</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->code.' - '.$cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="code" class="form-label">Code:</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="qty" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="qty" name="qty">
                    </div>
                </div>
            </div>
           
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>

        </form>
        
    </div>
</div>

@endsection