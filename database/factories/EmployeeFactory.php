<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => fake()->firstName() . fake()->lastName(),
            'role' => fake()->numberBetween(1, 2),
            'phone' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'admin_id' => 1
        ];
    }
}
