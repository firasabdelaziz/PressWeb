<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->has(Photo::factory()->count(5), 'photos')
            ->create();

        Post::factory()
            ->has(Photo::factory()->count(10), 'photos')
            ->create();
    }
}
