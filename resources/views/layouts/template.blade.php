<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">

</head>

<body>

    @include('layouts.navbar')

    <div class="container py-3">
        @yield('content')
    </div>

    <script src="{{ asset('assets/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>

    @yield('script')
</body>

</html>
