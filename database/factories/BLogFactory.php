<?php

namespace Database\Factories;

use App\Models\BLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BLog>
 */
class BLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tittle' => fake()->sentence(10),
            'deskripsi' => fake()->paragraph(3, true),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'user_id' => fake()->numberBetween(1, User::all()->count()),
        ];
    }
}
