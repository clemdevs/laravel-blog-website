<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(BlogPost $post)
    {
        $user = Auth::user();

        if (!$user->likes()->where('likeable_id', $post->id)->where('likeable_type', get_class($post))->exists()) {
            $like = new Like([
                'user_id' => $user->id,
            ]);

            $post->likes()->save($like);
        }

        return redirect()->back()->with('success', 'Post liked successfully');
    }

    public function unlike(BlogPost $post)
    {
        $user = Auth::user();

        $like = $user->likes()->where('likeable_id', $post->id)->where('likeable_type', get_class($post))->first();

        if ($like) {
            $like->delete();
        }

        return redirect()->back()->with('success', 'Post unliked successfully');
    }
}
