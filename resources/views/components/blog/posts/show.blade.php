<div class="post-single my-4">

@if(session('success'))
<x-flash-message type="success">
    {{ session('success') }}
</x-flash-message>
@endif

<h2 class="mb-2">{{ $post->title }}</h2>
<img src="{{ $post->image ? asset($post->image->url) : '' }}" class="img-fluid mb-2" />
@include('components.blog.posts.posts-metadata', ['author' => $post->user->name, 'postedAt' => date('m-d-Y'), strtotime($post->updated_at) ])
<p>{{ $post->content }}</p>

<div class="actions d-flex justify-content-between">

<div class="like-post d-flex align-items-center">

@if (Auth::check())
    <p class="mx-2 my-auto">{{ $post->likes->count() }}</p>

    @if (Auth::user()->likes->where('likeable_id', $post->id)->where('likeable_type', get_class($post))->count() > 0)
        <form method="POST" action="{{ route('likes.unlike', $post) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Unlike</button>
        </form>
    @else
        <form method="POST" action="{{ route('likes.like', $post) }}">
            @csrf
            <button type="submit" class="btn btn-outline-primary">Like</button>
        </form>
    @endif
@else
    <button class="btn btn-outline-secondary mx-2 my-auto" disabled>{{ $post->likes->count() }}<span> Likes</span></button>
@endif

</div>

@if (Auth::check() && Auth::user()->isAdmin())
    <div class="admin-actions d-flex">
        <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-primary" role="button">Edit Post</a>
        <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger" role="button">Delete Post</button>
        </form>
    </div>
@endif
</div>
</div>

<article class="comments-section">
    @if (Auth::check())
        @include('components.blog.comment.create', ['post' => $post])
    @endif
</article>

<article class="post-comments">
@foreach($post->comments as $comment)
<div class="card mb-2">
    <div class="card-body">

        <div class="comment-actions d-flex justify-content-between align-items-center">
            @include('components.blog.comment.show', ['comment' => $comment])
        </div>

        <div class="message my-2">
            {{ $comment->content }}
        </div>
        @if (Auth::check())
            <a href="#" class="reply-link btn btn-outline-primary" data-comment-id="{{ $comment->id }}">Reply</a>
            @include('components.blog.comment.reply-form', ['comment_id' => $comment->id])
        @endif
    </div>
</div>

<article class="comments-replies">
    @include('components.blog.comment.show-reply', ['replies' => $comment->replies->load('nestedReplies') ])
</article>
@endforeach
</article>

