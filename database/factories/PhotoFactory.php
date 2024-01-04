<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => $this->faker->imageUrl(),
            'imageable_id' => $this->faker->randomDigit,
            'imageable_type' => $this->faker->randomElement(['App\Models\User', 'App\Models\Post']),
        ];
    }
        /**
     * Indicate the polymorphic relationship to either User or Post.
     */
    public function configure()
    {
        return $this->afterCreating(function (Photo $photo) {
            if ($this->faker->boolean(50)) {
                // Associate with User
                $photo->imageable()->associate(User::factory()->create());
            } else {
                // Associate with Post
                $photo->imageable()->associate(Post::factory()->create());
            }
        });
    }
}
