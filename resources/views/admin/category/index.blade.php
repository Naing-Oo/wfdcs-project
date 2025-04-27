@extends('admin.layout.template')

@section('title', 'Category')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    Home/Category
                </h6>

                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-success" 
                    data-toggle="modal" data-target="#myModal">
                    New Category
                </button>

            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset($category->image_url) }}" 
                                        alt="{{ $category->name }}" class="img-fluid"
                                        width="100">
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button class="btn btn-primary">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger">
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

    @include('admin.category.modal')

@endsection
