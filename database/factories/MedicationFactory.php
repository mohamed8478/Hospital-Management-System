<?php

namespace Database\Factories;

use App\Models\Pharmacist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medication>
 */
class MedicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'quantity' => fake()->randomDigit(),
            'expiry_date'=>fake()->date(),
            'pharmacists_id'=> Pharmacist::factory()
        ];
    }
}
