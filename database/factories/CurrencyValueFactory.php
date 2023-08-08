<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CurrencyValue>
 */
class CurrencyValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logged_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'currency_value' => fake()->randomFloat(2, 1, 100),
            'currency_id' => 1, // You might adjust this as needed
        ];
    }
}
