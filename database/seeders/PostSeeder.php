<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // Import your Post model

class PostSeeder extends Seeder
{
    public function run()
    {
        // Seed posts
        Post::factory(10)->create();
    }
}
