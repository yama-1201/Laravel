<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bookmark; 
use App\Models\User; 
use App\Models\Store; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookmark>
 */
class BookmarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role',1)->inRandomOrder()->first()->id,
            'store_id' => Store::inRandomOrder()->first()->id,
            'created_at' => now(),
        ];
    }
}
