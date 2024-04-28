<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'post_id' => rand(1, 10), // Assuming you have 10 posts
            'user_id' => rand(1, 10), // Assuming you have 10 users
            'comment_body' => $this->faker->paragraph,
        ];
    }
}
