@extends('layouts.template')

@section('content')
    <div class="card border-0 shadow">
        <div class="card-header">
            <h4 class="card-title">Create User</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('user/store') }}" method="post">

                @csrf

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            
        </div>
    </div>
@endsection
