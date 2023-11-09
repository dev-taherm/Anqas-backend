<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'co_username' => fake()->unique()->userName,
        'co_address' => fake()->address,
        'co_city' => fake()->city,
        'user_id' => User::factory(),
        'co_phone' => fake()->unique()->phoneNumber,
        'co_bio' => fake()->paragraph,
        ];
    }
}
