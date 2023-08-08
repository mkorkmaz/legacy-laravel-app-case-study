<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Currency;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currencySymbols = ['$', '€', '£', '¥'];
        return [
        'long_name' => fake()->word,
        'currency_code' => fake()->currencyCode,
        'symbol' => fake()->randomElement($currencySymbols),
        'created_by' => 1, // You might adjust this as needed
        ];
    }
}
