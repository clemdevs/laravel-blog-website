@extends('base.app')

@section('content')
    @include('components.blog.posts.show', ['$post' => $post])
@endsection
