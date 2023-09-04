@extends('base.user')

@section('user-content')
    @include('components.blog.posts.create', ['categories' => $categories])
@endsection
