<nav class="navbar navbar-expand-lg bg-warning p-4 sticky-top top-0" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand text-dark" href="{{ route('home') }}">Toyz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-dark" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="{{ route('item') }}">Item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="{{ route('about') }}">About Us</a>
                </li>
            </ul>
            <div class="d-flex justify-content-center align-items-center gap-4">
                @if (Auth::user())
                    <a href="{{ route('checkout') }}" class="text-dark">
                        <i class="bi bi-cart"></i>
                    </a>
                    <a href="{{ route('invoice') }}" class="text-dark">
                        <i class="bi bi-receipt"></i>
                    </a>
                    <p class="text-dark m-0">Hello, {{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-dark">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                @endif
            </div>
        </div>
    </div>
    </div>
</nav>
