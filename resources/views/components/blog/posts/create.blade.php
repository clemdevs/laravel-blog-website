<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="postTitle" class="form-label">Title</label>
        <input type="text" name="title" placeholder="Post title..." class="form-control" id="postTitle">
        @error('title')
            <x-flash-message type="danger">{{ $message }}</x-flash-message>
        @enderror
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="category" class="form-label">Categories</label>
            @include('components.blog.categories.category-form', ['categories' => $categories, 'isEditing' => $isEditing])
            @error('category_id')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="textarea" class="form-label">Content</label>
        <textarea class="form-control" name="content" placeholder="Enter the post content" id="textarea"></textarea>
        @error('content')
            <x-flash-message type="danger">{{ $message }}</x-flash-message>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <div class="form-group">
            <input type="file" name="image" class="form-control-file">
            @error('image')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
