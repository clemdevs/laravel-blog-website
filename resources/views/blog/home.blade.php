@extends('base.guest')

@section('guest-content')
    <div class="area my-4 d-flex justify-content-between">

        @if(Auth::check())
            <a href="{{ route('post.create') }}" class="btn btn-primary" role="button">Create New Post</a>
        @endif
        @if(Auth::check() && Auth::user()->isAdmin())
            <form action="{{ route('posts.filter') }}" method="GET" class="d-flex" id="categoryForm">
                @include('components.blog.categories.category-form', ['categories' => $categories])
            </form>
            @else
            <form action="{{ route('posts.filter') }}" method="GET" id="categoryForm">
                @include('components.blog.categories.category-form', ['categories' => $categories ])
            </form>
        @endif
    </div>
    <article class="blog-posts d-flex flex-wrap justify-content-between" style="flex: 25%;">

        @if(session('success'))
        <x-flash-message type="success">
            {{ session('success') }}
        </x-flash-message>
        @endif

        @foreach($posts as $post)
            <x-blog.home :post="$post"></x-blog.home>
        @endforeach

        {{ $posts->links('vendor.pagination.bootstrap-5') }}

    </article>
@endsection
