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
                        <a class="nav-link active" aria-current="page" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/aboutUs">About Us</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
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
