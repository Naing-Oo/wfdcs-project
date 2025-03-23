<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('user/index') }}">User</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">PHP</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/variables') }}">Variables</a></li>
                        <li><a class="dropdown-item" href="{{ url('/strings') }}">Strings</a></li>
                        <li><a class="dropdown-item" href="{{ url('/operator') }}">Operator</a></li>
                        <li><a class="dropdown-item" href="{{ url('/loops') }}">Loops</a></li>
                        <li><a class="dropdown-item" href="{{ url('/functions') }}">Functions</a></li>
                        <li><a class="dropdown-item" href="{{ url('/arrays') }}">Arrays</a></li>
                    </ul>
                </li>
            </ul>

            @if (!Auth::check())
                <a href="{{ route('login') }}" class="btn btn-secondary mx-3">Login</a>
            @else
                <h5 class="mx-2 text-white">{{ Auth::user()->name }}</h5>
                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endif

        </div>
    </div>
</nav>
