<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence,
            'content' => fake()->paragraphs(3, true),
            'category_id' => Category::pluck('id')->random()
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function(BlogPost $post){
            $image = Image::factory()->create([
                'imageable_id' => $post->id, // Associate with the current post
            ]);
            $post->image()->save($image);
        });
    }
}
