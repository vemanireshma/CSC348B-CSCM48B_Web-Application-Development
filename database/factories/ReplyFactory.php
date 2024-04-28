<?php

namespace Database\Factories;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    protected $model = Reply::class;

    public function definition()
    {
        return [
            'post_id' => rand(1, 10), // Assuming you have 10 posts
            'user_id' => rand(1, 10), // Assuming you have 10 users
            'comment_id' => rand(1, 30), // Assuming you have 30 comments
            'reply_body' => $this->faker->paragraph,
        ];
    }
}
