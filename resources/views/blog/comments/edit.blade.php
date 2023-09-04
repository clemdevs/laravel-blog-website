@extends('base.user')

@section('user-content')
    @include('components.blog.comment.edit', ['comment' => $comment])
@endsection
