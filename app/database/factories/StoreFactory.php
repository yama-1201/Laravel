<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $image = fake()->image('public/storage/images', 400, 300, null, false); 

        return [
            'name' => fake()->name(),
            'image_path' => 'storage/images/' . $image,
            'description' => fake()->sentence(),
            'address' => fake() -> address(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
