<form method="POST" action="{{ route('post.update', ['post' => $post]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="postTitle" class="form-label">Title</label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="postTitle">
        @error('title')
            <x-flash-message type="danger">{{ $message }}</x-flash-message>
        @enderror
    </div>
    <div class="mb-3">
        @include('components.blog.categories.category-form', ['categories' => $categories, 'isEditing' => $isEditing])
    </div>
    <div class="mb-3">
        <label for="textarea" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="textarea">{{ $post->content }}</textarea>
        @error('content')
            <x-flash-message type="danger">{{ $message }}</x-flash-message>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <div class="form-group">
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>
        @error('image')
            <x-flash-message type="danger">{{ $message }}</x-flash-message>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
