@extends('layouts.template')

@section('content')

    <h1>Hello World</h1>

    <a href="{{ url('/dashboard') }}">Dashboard</a>
    <a href="{{ url('/product') }}">Product</a>
    
@endsection