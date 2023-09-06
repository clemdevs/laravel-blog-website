<h2>Create a category.</h2>
<form method="POST" action="{{ route('categories.store') }}" class="mb-4">
    @csrf
    <input type="text" name="name" placeholder="Post title..." class="form-control" id="categoryName">
    <button type="submit" class="btn btn-outline-primary">Add Category</button>
</form>
