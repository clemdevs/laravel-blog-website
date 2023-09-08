<div class="blog-post card mb-4 p-2 w-100">
    <div class="d-flex flex-column">
    <h2>{{ $attributes['post']->title }}</h2>
    <img src="{{ $attributes['post']->image ? $attributes['post']->image->url : '' }}" class="img-fluid">
    @include('components.blog.posts.posts-metadata', ['author' => $attributes['post']->user->name, 'postedAt' => date('m-d-Y'), strtotime($attributes['post']->updated_at) ])
    </div>
    <p>{{ $attributes['post']->excerpt() }}</p>
    <a href="{{ route('post.show', $attributes['post']->id) }}" class="btn btn-primary" role="button">Read More</a>
</div>
