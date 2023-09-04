<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class PostFilterController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = BlogPost::query();

        $categoryId = $request->input('category_filter');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $title = $request->input('title');

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        $posts = $query->latest()->paginate(12);

        $categories = Category::all();

        return view('blog.home', compact('posts', 'categories'));
    }
}
