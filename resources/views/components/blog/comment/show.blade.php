<div class="author fw-bold">{{ $comment->user->name }}</div>
@if(Auth::check() && Auth::user()->isAdmin())
@include('components.blog.comment.comment-actions', ['routeName' => 'comments', 'reply' => $comment->id ])
@endif
