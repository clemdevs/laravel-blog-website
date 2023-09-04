@extends('base.user')

@section('user-content')
    @include('components.blog.posts.edit', ['post' => $post])
@endsection
