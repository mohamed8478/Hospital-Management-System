<?php

namespace Database\Factories;

use App\Models\Receptionist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['male','female']),
            'address' =>fake()->address(),
            'phone_num' => fake()->phoneNumber(),
            'maladies' => fake()->word(),
            'email' => fake()->unique()->safeEmail(),
            'chronic_conditions' => fake()->word(),
            'recep_id' => Receptionist::factory(),
        ];
    }
}
