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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
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
                                    <img src="{{ asset($category->image_url) }}" alt="{{ $category->name }}"
                                        class="img-fluid" width="100">
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button class="btn btn-primary" 
                                        onclick="edit('{{ route('categories.edit', $category->id) }}')">
                                        Edit
                                    </button>

                                    <button class="btn btn-danger"
                                        onclick="confirmDelete('{{ route('categories.destroy', $category->id) }}')">
                                        Delete
                                    </button>
                                    {{-- <form id="frmDelete" action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form> --}}
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

@section('script')
    <script>

        // delete
        function confirmDelete(url) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteRecord(url);
                }
            });
        }

        function deleteRecord(url) {
            $.ajax({
                type: 'delete',
                url: url,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'name': 'saw aung naing oo'
                },
                success: function(msg) {
                    alertDeleted(msg);

                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            });
        }

        function alertDeleted(msg) {
            Swal.fire({
                title: "Deleted!",
                text: msg,
                icon: "success"
            });
        }

        // edit
        function edit(url) {
            $.ajax({
                type:'get',
                url:url,
                success: function(data) {
                    // console.log(data.name);
                    // console.log(data.image_url);

                    $modal = $('#myModal');
                    $modal.find('#name').val(data.name);
                    $modal.find('#id').val(data.id);
                    $modal.modal('show');
                }
            });
        }
    </script>
@endsection
