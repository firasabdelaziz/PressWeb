<?php

namespace Database\Factories;

// database/factories/PostCategoryFactory.php
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'category_id' => Category::factory(),
        ];
    }
}

