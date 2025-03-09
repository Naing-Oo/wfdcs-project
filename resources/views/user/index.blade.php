@extends('layouts.template')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>User</h3>
        <a href="{{ url('user/create') }}" class="btn btn-primary">New User</a>
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
