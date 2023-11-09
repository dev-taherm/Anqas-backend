<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\User;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName,
        'default_shipping_address' => fake()->address,
        'city' => fake()->city,
        'user_id' => User::factory(),
        'phone' => fake()->unique()->phoneNumber,
        'bio' => fake()->paragraph,
        ];
    }
}
