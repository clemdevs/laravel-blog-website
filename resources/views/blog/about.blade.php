@extends('base.guest')

@section('guest-content')
    <ul class="about list-group my-4">
        <h1>About The Project</h1>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>Added the required pages.</li>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>User authentication</li>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>CRUD for posts.</li>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>Blog posts have categories.</li>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>Pagination with option to filter posts by title or categories</li>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>Unique likes for posts.</li>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>Comment system (comments can only be edited and deleted by admin)</li>
        <li class="list-group-item"><i class="fa-solid fa-check"></i>Contact form. Use MailTrap to send emails.</li>
    </ul>
@endsection
