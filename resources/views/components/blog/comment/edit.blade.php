<h2>Edit Comment</h2>
<form method="POST" action="{{ route('comments.update', $comment) }}">
    @csrf
    @method('PUT')
    <textarea name="content" rows="3" class="form-control mb-2">{{ $comment->content }}</textarea>
    <button type="submit" class="btn btn-outline-primary">Update Comment</button>
</form>
