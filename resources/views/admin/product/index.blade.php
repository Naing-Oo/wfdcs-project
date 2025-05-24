@extends('admin.layout.template')

@section('title', 'Products')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    Home/Product
                </h6>

                <a href="{{ route('products.create') }}" class="btn btn-success">New Product</a>

            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Discount</th>
                            <th class="text-right">Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $i => $pro)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $pro->code }}</td>
                                <td>
                                    {{-- @if (count($pro->images) == 0)
                                        <img src="{{ asset('admin/img/No_Image_Available.jpg') }}" alt=""
                                            width="100">
                                    @else
                                        <img src="{{ asset($pro->images->first()->image_url) }}" alt=""
                                            width="100">
                                    @endif --}}

                                    <img src="{{ $pro->first_image }}" alt="" width="100">

                                    {{-- {!! $pro->first_image !!} --}}

                                </td>
                                <td>
                                    <img src="{{ asset($pro->category->image_url) }}" alt="" width="100">
                                    {{ $pro->category->name }}
                                </td>
                                <td>{{ $pro->name }}</td>
                                <td>{{ $pro->description }}</td>
                                <td>{{ $pro->price }}</td>
                                <td>{{ $pro->discount }}</td>
                                <td>{{ $pro->qty }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $pro->id) }}" class="btn btn-primary">Edit
                                    </a>
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete('{{ route('products.destroy', $pro->id) }}')">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
