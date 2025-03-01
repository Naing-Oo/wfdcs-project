@extends('layouts.template')

@section('content')
    
    <div class="card border-0 shadow">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item border-0">
                    ID: {{ $user->id }}
                </li>
                <li class="list-group-item border-0">
                    Name: {{ $user->name }}
                </li>
                <li class="list-group-item border-0">
                    Email: {{ $user->email }}
                </li>
            </ul>
            <a href="{{ url('/user/index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>

@endsection