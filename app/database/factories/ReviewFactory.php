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
        $imageFiles = glob(storage_path('app/public/images/*.{jpg,jpeg,png,webp}'), GLOB_BRACE);
        $imagePath = fake()->randomElement($imageFiles);
        $imageName = basename($imagePath);

        return [
            //factory
            'user_id' => User::where('role',1)->inRandomOrder()->first()->id,
            'store_id' => Store::inRandomOrder()->first()->id,
            'title' => fake()->text(30),
            'image' => 'images/' . $imageName,
            'content' => fake()->sentence(),
            'rating' => fake()->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
