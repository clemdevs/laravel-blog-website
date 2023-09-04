<select name="{{ (($isEditing ?? null) && $isEditing === true) ? 'category_id' : 'category_filter' }}" id="category" class="form-select">
    <option selected hidden>All Categories</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}" {{ ($post->category_id ?? null) == $category->id || request('category_filter') == $category->id ? 'selected' : '' }}>
        {{ $category->name }}
    </option>
    @endforeach
</select>
