@foreach($replies as $reply)
    <div class="comment-reply">
        <div class="card mb-2">
            <div class="card-body">
                <div class="reply d-flex justify-content-between align-items-center">
                    <div class="fw-bold">{{ $reply->user->name }}</div>
                    @if(Auth::check() && Auth::user()->isAdmin())
                        @include('components.blog.comment.comment-actions', ['routeName' => 'replies', 'reply' => $reply->id ])
                    @endif
                </div>

                <div class="my-2">{{ $reply->body }}</div>
                @if(Auth::check())
                    <a href="#" class="reply-link-nested btn btn-outline-primary"data-reply-id="{{ $reply->id }}">Reply</a>
                    @include('components.blog.comment.nestedreplies-form', ['replies' => $reply->load('nestedReplies')])
                @endif
            </div>
        </div>
    </div>
@endforeach
