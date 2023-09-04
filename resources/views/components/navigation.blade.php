<!-- navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('blog.index') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.contact') }}">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @if (Auth::check())
                @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                @endif
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>

        <!-- Search form -->
        <form action="{{ route('posts.filter') }}" method="GET" class="d-flex">

            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="title" value="{{ request('title') }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <!-- /Search form -->

    </div>
</div>
</nav>
<!-- /navigation -->
