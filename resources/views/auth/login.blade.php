@extends('layouts.template')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2 class="text-center">LOGIN</h2>
        </div>
        <div class="card-body">

            <form action="{{ route('login.store') }}" method="post">

                @csrf

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label" for="showPassword">Show</label>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5">
                    <a href="#" class="btn btn-warning">Register</a>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).on('change', '#showPassword', function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
                $('#password_confirmation').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
                $('#password_confirmation').attr('type', 'password');
            }
        });
    </script>
@endsection