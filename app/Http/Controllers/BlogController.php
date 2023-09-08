<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Category;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::with('category')->latest()->paginate(12);
        $categories = Category::all();
        return view('blog.home', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $isEditing = true;
        return view('blog.posts.create', compact('categories', 'isEditing'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $postRequest)
    {
        $imagePath = null;

        $validatedData = $postRequest->validated();

        $imageData = $postRequest['image'];

        $user = Auth::user();
        $post = BlogPost::create(array_merge($validatedData, ['user_id' => $user->id]));

        if (!empty($imageData)) {
            $imagePath = ImageUploadService::uploadImage($imageData, $post);
        }

        if (isset($imagePath)) {
            $post->image()->create(['url' => $imagePath]);
        }

        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $post)
    {
        $post->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('blog.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $post)
    {
        $categories = Category::all();
        $isEditing = true;
        return view('blog.posts.edit', compact('post', 'categories', 'isEditing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $postRequest, BlogPost $post)
    {
        $imagePath = $post->image->url;
        $validatedData = $postRequest->validated();

        if (array_key_exists('image', $validatedData) && !is_null($validatedData['image'])) {
            if($post->image){
                ImageUploadService::deleteImage($post->image->url);
            }
            $imagePath = ImageUploadService::uploadImage($validatedData['image'], $post);

        } else {
            unset($validatedData['image']);
        }

        $post->update(array_merge($postRequest->validated(), ['user_id' => Auth::user()->id]));

        if ($post->image) {
            $post->image->update(['url' => $imagePath]);
        }

        return redirect()->route('blog.index')->with('success', 'Post updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $post)
    {
        if ($post->image->exists()) {
            ImageUploadService::deleteImage($post->image->url);
        }

        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post deleted successfully!');
    }
}
