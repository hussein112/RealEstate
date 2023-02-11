<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EnquiryFactory extends Factory
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
            'issuer_name' => fake()->name(),
            'issuer_email' => fake()->email(),
            'issuer_phone' => fake()->phoneNumber(),
            'issuer_message' => fake()->paragraph(),
            'employee_id' => fake()->numberBetween(2, 3),
            'property_id' => 5
        ];
    }
}
