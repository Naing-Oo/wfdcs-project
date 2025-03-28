@extends('layouts.template')

@section('content')

    {{-- alert --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> {{ session()->get('delete') }}
        </div>
    @endif
    {{-- alert --}}

    <div class="d-flex justify-content-between">
        <h3>User</h3>
        <a href="{{ url('user/create') }}" class="btn btn-primary">New User</a>
    </div>

    <form action="{{ route('user.index') }}">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $name }}">
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" id="gender" class="form-select">
                        <option value="">Select...</option>
                        <option value="m" @if($gender == 'm') selected @endif>Male</option>
                        <option value="f" @if($gender == 'f') selected @endif>Female</option>
                        <option value="o" @if($gender == 'o') selected @endif>Other</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label for=""></label> <br>
                    <button type="submit" class="btn btn-secondary">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div>
        {{ url()->current() }}
        <br>
        {{ url()->full() }}
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $i => $user)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>

                    <td>
                        @switch($user->gender)
                            @case('m')
                                Male
                            @break

                            @case('f')
                                Female
                            @break

                            @default
                                {{ $user->other ?? 'other' }}
                        @endswitch
                    </td>

                    <td>
                        {{-- {{ Carbon\Carbon::parse($user->birth_date)->format('d/m/Y  H:i:s') }} --}}
                        {{ Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') }}
                    </td>
                    <td>
                        <a href="{{ url('user/show/' . $user->id) }}" class="btn btn-info">
                            View
                        </a>
                        <a href="{{ url('user/' . $user->id . '/edit') }}" class="btn btn-secondary">
                            Edit
                        </a>
                        <button class="btn btn-danger js-delete" data-id="{{ $user->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form id="frmDelete" action="" method="post">
        @csrf
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.js-delete').on('click', function() {
                let id = $(this).attr('data-id');
                jsDelete(id);

                // let url = '/user/destroy/' + id;
                // $('#frmDelete').attr('action', url);
                // $('#frmDelete').trigger('submit');
            });
        });

        function jsDelete(id) {
            $.ajax({
                type: 'delete', // get,post,delete,put,push
                url: '/user/destroy/' + id,
                data: {
                    '_token': '{{ csrf_token() }}',
                    id
                },
                success: function(msg) {
                    // console.log(msg);
                    window.location.reload();
                },
            });
        }
    </script>
@endsection
