<form method="POST" action="{{ route('replies.store') }}" class="reply-form mt-2" data-comment-id="{{ $comment->id }}">
    @csrf
    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
    <textarea name="body" rows="3" class="form-control mb-2"></textarea>
    <button type="submit" class="btn btn-outline-primary">Add Reply</button>
</form>
