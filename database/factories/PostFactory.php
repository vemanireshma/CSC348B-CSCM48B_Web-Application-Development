<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'category_id' => rand(1, 5), // Assuming you have 5 categories
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'yt_iframe' => null, // or generate some dummy iframe
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->text,
            'meta_keyword' => $this->faker->word,
            'status' => 0,
            'created_by' => rand(1, 10) // Assuming you have 10 users
        ];
    }
}
