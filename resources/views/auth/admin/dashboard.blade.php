
@extends('base.app-admin')

@section('admin-content')
<div class="container">
    <h2>Welcome from dashboard.</h2>

    <a href="{{ route('blog.index') }}" class="btn btn-outline-primary" type="button">Go back</a>
    </div>
@endsection
