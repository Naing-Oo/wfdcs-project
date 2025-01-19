@extends('layouts.template')

@section('content')
    <h1>Product</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>#</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection