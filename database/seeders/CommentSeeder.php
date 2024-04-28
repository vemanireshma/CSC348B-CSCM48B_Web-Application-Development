<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment; // Import your Comment model

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Seed comments
        Comment::factory(30)->create(); // Assuming each post might have multiple comments
    }
}
