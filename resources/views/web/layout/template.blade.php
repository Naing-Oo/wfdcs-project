<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}" type="text/css">

    <style>
        .hero__item {
            display: none;
        }

        .disabled {
            pointer-events: none;
            cursor: no-drop;
            opacity: 0.6;
        }

        .btn-success {
            background-color: #7fad39 !important;
            border: none;
        }
    </style>

    @yield('style')

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    @include('web.layout.topmenu')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('web.layout.navbar')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('web.layout.hero')
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    @include('web.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('web/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/js/main.js') }}"></script>
    <script src="{{ asset('admin/vendor/sweetalert/sweetalert2.js') }}"></script>

    <script>
        function alertDeleted(msg) {
            Swal.fire({
                title: "Deleted!",
                text: msg,
                icon: "success"
            });
        }

        function alertSuccess(msg) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: msg,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>

    @yield('script')

</body>

</html>
