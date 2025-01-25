@extends('layouts.template')

@section('content')
    <h1>Product</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary">New</a>

    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>#</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection