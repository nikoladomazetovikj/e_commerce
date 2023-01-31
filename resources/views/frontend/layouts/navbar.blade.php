<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top ">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="{{route('home')}}">
                <h4 class="text-success">Super Seeds</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse me-auto" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto font-1rem">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/aboutUs">About Us</a>
                    </li>

                </ul>
                <form class="d-flex" role="search" action="{{route('searched')}}" method="POST">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                           id="search" name="search">
                </form>

                <a href="{{ route('cart') }}" class="text-warning ">
                    <button type="button" class="btn  position-relative">
                        <i class="fa-sharp fa-solid fa-cart-shopping text-warning"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                       {{ count((array) session('cart')) }}
                    </span>
                    </button>
                </a>
                <span class="navbar-text">
                        @if(Auth::check())
                        <a class="mx-3"  href="/dashboard">Dashboard</a>
                    @else
                        <a href="/login" class="mx-3">Login</a>
                        <a href="/register">Register</a>
                    @endif
                </span>

            </div>
        </div>

    </nav>
</header>
