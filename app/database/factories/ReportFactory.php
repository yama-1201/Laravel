<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;
use App\Models\User;
use App\Models\Review;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review_id' => Review::inRandomOrder()->first()->id,
            'user_id' => User::where('role',1)->inRandomOrder()->first()->id,
            'comment' => fake()-> realText(),
            'created_at' => now(),

        ];
    }
}
