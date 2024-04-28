<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->text,
            'meta_keyword' => $this->faker->word,
            'navbar_status' => 0,
            'status' =>0,
            'created_by' => rand(1, 10) // Assuming you have 10 users
        ];
    }
}
