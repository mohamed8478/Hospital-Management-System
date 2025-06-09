<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(), // Create a related patient
            'doctor_id' => Doctor::factory(), // Create a related doctor
            'Duree_du_trait' => $this->faker->randomElement(['7 days', '14 days', '1 month']),
            'followup_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'doctor_notes' => $this->faker->sentence(),
            'additional_instructions' => $this->faker->paragraph(),
        ];
    }
}
