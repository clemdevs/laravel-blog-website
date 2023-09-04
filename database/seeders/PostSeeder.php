<?php

namespace Database\Seeders;

use App\Events\PostDeleting;
use App\Models\BlogPost;
use App\Models\User;
use App\Services\ImageUploadService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postsWithImages = BlogPost::has('image')->get();

        foreach($postsWithImages as $post){
            ImageUploadService::deleteImage($post->image->url);
        }

        $random_admin = User::Admins()->get()->random();
        if($random_admin){
            BlogPost::factory(20)->for($random_admin)->create();
        }
    }
}
