<?php

namespace App\Traits\Posts;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

trait Likable
{
    public function like()
    {
        $user = Auth::user();

        if (!$this->likes()->where('user_id', $user->id)->exists()) {
            $like = new Like(['user_id' => $user->id]);
            $this->likes()->save($like);
        }
    }

    public function unlike()
    {
        $user = Auth::user();

        $this->likes()->where('user_id', $user->id)->delete();
    }

    public function scopeIsLikedByLoggedInUser()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
}
