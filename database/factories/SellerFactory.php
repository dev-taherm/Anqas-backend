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
            'user_id' => User::factory()->create()->id,
            'o_username' => fake()->unique()->userName(),
            'o_name' => fake()->company(),
            'o_address' => fake()->address(),
            'o_city' => fake()->citySuffix(),
            'o_phone' => fake()->phoneNumber(), 
            'o_bio' => fake()->paragraph(),
       
        ];
    }
}
