<h2>Add a Comment</h2>
<form method="POST" action="{{ route('comments.store') }}" class="mb-4">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="content" rows="3" class="form-control mb-2"></textarea>
    <button type="submit" class="btn btn-outline-primary">Add Comment</button>
</form>
