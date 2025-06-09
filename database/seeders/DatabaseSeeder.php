<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Pharmacist;
use App\Models\Prescription;
use App\Models\Receptionist;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Doctor::factory(3)->create();
            // Receptionist::factory(3)->create();
            // Pharmacist::factory(3)->create();
        // Patient::factory(20)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // Medication::factory(10)->create();
        Prescription::factory()
        ->count(10)
        ->hasAttached(
            Medication::factory()->count(3), // Attach 3 medications per prescription
            ['quantity'=>1]
        )
        ->create();
        // ]);
    }
}
