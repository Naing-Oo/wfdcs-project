@extends('admin.layout.template')

@section('title', 'Promotions')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Promotion</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    Home/Promotion
                </h6>

                <a href="{{ route('promotions.create') }}" class="btn btn-success">New Promotion</a>

            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th class="text-right">Discount</th>
                            <th class="text-right">Price</th>
                            <th>Effective Date</th>
                            <th>Expired Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotions as $i => $pro)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    <img src="{{ $pro->image_full_url }}" alt="img" width="100">
                                </td>
                                <td>
                                    {{ $pro->product->name }}
                                </td>
                                <td>{{ $pro->description }}</td>
                                <td>{{ $pro->discount }}</td>
                                <td>{{ $pro->price }}</td>
                                <td>{{ Carbon\Carbon::parse($pro->effective_date)->format('d/m/Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($pro->expired_date)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('promotions.edit', $pro->id) }}" class="btn btn-primary">Edit
                                    </a>
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete('{{ route('promotions.destroy', $pro->id) }}')">
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
