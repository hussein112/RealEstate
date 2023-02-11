<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Valuation>
 */
class ValuationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_issued' => fake()->dateTime(),
            'issuer_fname' => fake()->firstName(),
            'issuer_mname' => fake()->firstName(),
            'issuer_lname' => fake()->lastName(),
            'issuer_email' => fake()->email(),
            'issuer_phone' => fake()->phoneNumber(),
            'address_one' => fake()->streetAddress(),
            'address_two' => fake()->streetAddress(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'furnishing_status' => fake()->numberBetween(1, 3),
            'garage' => fake()->numberBetween(1, 2),
            'bedrooms_nb' => fake()->numberBetween(1, 10),
            'bathrooms_nb' => fake()->numberBetween(1, 10),
            'valuation_type' => fake()->numberBetween(1, 2),
            'description' => fake()->paragraph(),
            'valuation_status' => fake()->numberBetween(1, 2),
            'due_date' => fake()->dateTime()
        ];
    }
}
