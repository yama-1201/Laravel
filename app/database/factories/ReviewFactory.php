<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Store;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = fake()->image('public/storage/images', 400, 300, null, false); 

        return [
            //factory
            'user_id' => User::where('role',1)->inRandomOrder()->first()->id,
            'store_id' => Store::inRandomOrder()->first()->id,
            'title' => fake()->text(30),
            'image' => 'public/storage/images/' . $image,
            'content' => fake()->sentence(),
            'rating' => fake()->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
