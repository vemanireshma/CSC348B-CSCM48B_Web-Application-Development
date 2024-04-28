<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reply; // Import your Reply model

class ReplySeeder extends Seeder
{
    public function run()
    {
        // Seed replies
        Reply::factory(50)->create(); // Assuming some comments might have replies
    }
}
