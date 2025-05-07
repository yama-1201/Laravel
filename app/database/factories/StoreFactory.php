<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageFiles = glob(public_path('storage/images/*.{jpg,jpeg,png,webp}'),GLOB_BRACE);
        $imagePath = fake()->randomElement($imageFiles);
        $imageName = basename($imagePath);

        return [
            'user_id' => User::where('role',1)->inRandomOrder()->first()->id,
            'name' => fake()->lastName() . '商店',
            'image_path' => 'storage/images/' . $imageName,
            'description' => fake()->sentence(),
            'address' => fake() -> address(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
