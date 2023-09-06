<h2>Edit Category</h2>
<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')
    <textarea name="name" rows="3" class="form-control mb-2">{{ $comment->name }}</textarea>
    <button type="submit" class="btn btn-outline-primary">Update Category</button>
</form>
