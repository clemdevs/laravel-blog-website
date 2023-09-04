<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('blog.about');
    }

    public function contact()
    {
        $owner = User::admins()->first();
        return view('blog.contact', compact('owner'));
    }
}
