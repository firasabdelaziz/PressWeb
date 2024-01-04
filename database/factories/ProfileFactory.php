<?php

namespace Database\Factories;
// database/factories/ProfileFactory.php
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'mobile' => $this->faker->phoneNumber,
        ];
    }
}
