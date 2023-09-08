<!-- navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

    <a class="navbar-brand" href="{{ route('blog.index') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="inner-menu d-lg-flex flex-lg-fill justify-content-lg-between">

            <!-- BEGIN Menu left area -->
            <div class="menu-start">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link{{ (request()->is('/')) ? ' active' : '' }}" href="{{ route('blog.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ (request()->is('about')) ? ' active' : '' }}" href="{{ route('blog.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ (request()->is('contact')) ? ' active' : '' }}" href="{{ route('blog.contact') }}">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- END Menu left area -->

            <!-- BEGIN Menu right area -->
            <div class="menu-end d-lg-flex align-items-lg-center">

            <!-- Search form -->
            <article class="search">
                <form action="{{ route('posts.filter') }}" method="GET" class="d-flex mr-2">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="title" value="{{ request('title') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </article>
            <!-- /Search form -->

            @if(Auth::check())
            <div class="user-area">
                <div class="dropdown-container">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(!Auth::user()->image)
                        <div class="default-user" role="button">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        @endif
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item{{ (request()->is('post/create')) ? ' active' : '' }}" href="{{ route('post.create') }}">New post</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @else

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>

            @endif

            </div>
            <!-- END Menu right area -->
        </div>
    </div>
</div>
</nav>
<!-- /navigation -->
