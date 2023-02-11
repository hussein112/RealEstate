<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointement>
 */
class AppointementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'date' => fake()->dateTime(),
            'issuer_name' => fake()->name(),
            'issuer_message' => fake()->paragraph(),
            'issuer_phone' => fake()->numberBetween(10, 2002),
            'admin_id' => 1,
            'employee_id' => fake()->numberBetween(2, 3),
            'property_id' => 11
        ];
    }
}
