@extends('layouts.template')

@section('content')
    <h1>Product</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Apple</td>
                <td>40</td>
                <td>100</td>
                <td>
                    <a href="{{ url('/product/1') }}" class="btn btn-primary">View</a>
                </td>
            </tr>
            <tr>
                <td>Orange</td>
                <td>30</td>
                <td>200</td>
                <td>
                    <a href="{{ url('/product/2') }}" class="btn btn-primary">View</a>
                </td>
            </tr>
            <tr>
                <td>Banana</td>
                <td>10</td>
                <td>50</td>
                <td>
                    <a href="{{ url('/product/3') }}" class="btn btn-primary">View</a>
                </td>
            </tr>
        </tbody>
    </table>
    
@endsection