<form method="POST" action="{{ route('replies.store') }}" class="reply-form mt-2" data-parent-reply-id="{{ $reply->id }}" style="display: none;">
    @csrf
    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
    <input type="hidden" name="parent_id" value="{{ $reply->id }}">
    <textarea name="body" rows="3" class="form-control mb-2"></textarea>
    <button type="submit" class="btn btn-outline-primary" data-reply-id="{{ $reply->id }}">Add Reply</button>
</form>
