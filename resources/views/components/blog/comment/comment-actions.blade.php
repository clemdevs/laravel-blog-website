<div class="comment-actions d-flex">
    <a href="{{ route("$routeName.edit", $reply) }}" class="btn btn-sm btn-primary">Edit</a>
    <form action="{{ route("$routeName.destroy", $reply) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
</div>
