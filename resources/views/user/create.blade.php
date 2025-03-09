@extends('layouts.template')

@section('content')
    <div class="card border-0 shadow">
        <div class="card-header">
            <h4 class="card-title">Create User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post" autocomplete="on">

                @csrf

                <div class="row">

                    {{-- info --}}
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span>:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender <span class="text-danger">*</span>:</label>
                            
                            @php
                                $old = old('gender');
                            @endphp

                            {{-- <select name="gender" id="gender" class="form-select">
                                <option value="">Select...</option>
                                <option value="m" @if($old == 'm') selected @endif>Male</option>
                                <option value="f" @if($old == 'f') selected @endif>Female</option>
                                <option value="o" @if($old == 'o') selected @endif>Other</option>
                            </select> --}}

                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="m" @if($old == 'm') checked @endif>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="f" @if($old == 'f') checked @endif>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" id="other" name="gender" value="o" @if($old == 'o') checked @endif>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                                <input type="text" class="form-control @if($old !== 'o') d-none @endif" name="other" value="{{ old('other') }}">
                            </div>

                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('other')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Birthday <span class="text-danger">*</span>:</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                            @error('birth_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- contact --}}
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span>:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span>:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- password --}}
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span>:</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password <span
                                    class="text-danger">*</span>:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" value="{{ old('password_confirmation') }}">

                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label" for="showPassword">Show</label>
                        </div>
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <a href="{{ url('/user/index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

            </form>


            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('change', '#showPassword', function() {
            // console.log($(this).is(':checked'));

            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
                $('#password_confirmation').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
                $('#password_confirmation').attr('type', 'password');
            }
        });
        $(document).on('change', 'input[name="gender"]', function(){
            const value = $(this).val();

            if (value === 'o') {
                $('input[name="other"]').removeClass('d-none');
            } else {
                $('input[name="other"]').addClass('d-none');
            }

            
        });
    </script>
@endsection
