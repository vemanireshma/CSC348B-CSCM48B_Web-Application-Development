<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import your User model

class UserSeeder extends Seeder
{
    public function run()
    {
        // Seed users
        User::factory(10)->create(); // Adjust the number as needed
    }
}
