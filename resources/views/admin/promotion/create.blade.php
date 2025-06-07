@extends('admin.layout.template')

@section('title', 'Promotion')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Promotion</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            New Promotion
        </div>

        <div class="card-body">

            <form action="{{ route('promotions.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($products as $prod)
                                    <option value="{{ $prod->id }}" @if (old('product_id') == $prod->id) selected @endif>
                                        {{ $prod->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control"
                                value="{{ old('description') }}">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="discount">Discount(%)</label>
                            <input type="number" id="discount" name="discount" class="form-control"
                                value="{{ old('discount') }}">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control"
                                value="{{ old('price') }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="effective_date">Effective Date</label>
                            <input type="date" id="effective_date" name="effective_date" class="form-control"
                                value="{{ old('effective_date') }}">
                            @error('effective_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="expired_date">Expired Date</label>
                            <input type="date" id="expired_date" name="expired_date" class="form-control"
                                value="{{ old('expired_date') }}">
                            @error('expired_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                </div>

                <div class="text-center my-5">
                    <a href="{{ route('promotions.index') }}" class="btn btn-outline-secondary px-5">Back</a>
                    <button type="submit" class="btn btn-outline-primary px-5">Save</button>
                </div>

            </form>

        </div>
    </div>
@endsection
