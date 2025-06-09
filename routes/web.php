<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceptionController;
use App\Http\Middleware\Rolemiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('doctor.add-prescription');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard/doctor', function(){
//         return view('doctor.add-prescription');
//     })->middleware([Rolemiddleware::class.':doctor']);
// });


Route::middleware('auth')->group(function () {
    // Reception Routes
    Route::prefix('reception')->middleware([Rolemiddleware::class.':reception'])->group(function () {
        Route::get('/', function () {
            return view('receptionist.find-patient');
        })->name('reception.home');
        Route::post('/', [ReceptionController::class , 'store'])->name('reception.add');

        Route::get('/search', [ReceptionController::class, 'find'])->name('reception.search');

        Route::get('/add', function () {
            return view('receptionist.add-patient');
        })->name('add_patient');
    });

    // Pharmacy Routes
    Route::prefix('pharmacy')->middleware([Rolemiddleware::class.':pharmacy'])->group(function () {
        Route::get('/', function () {
            return view('pharmacy.medicament-list');
        })->name('pharmacy.home');

        Route::get('/search', [PharmacyController::class, 'find'])->name('pharmacy.search');
        Route::post('/add', [PharmacyController::class , 'store'])->name('pharmacy.add');

        Route::get('/add', function () {
            return view('pharmacy.add-medicament');
        })->name('pharmacy.add');
    });

    // Doctor Routes
    Route::prefix('doctor')->middleware([Rolemiddleware::class.':doctor'])->group(function () {
        Route::get('/', function () {
            return view('doctor.find-patient');
        })->name('doctor.home');

        Route::get('/{patient}/history', [DoctorController::class, 'showHistory'])->name('patients.history');

        Route::get('/patient', function () {
            return view('doctor.patient-history');
        });

        Route::get('/search', [DoctorController::class, 'find'])->name('doctor.search');
        Route::get('/searchmed', [DoctorController::class, 'findMedicament'])->name('doctor.search.medication');
        Route::post('/add/{patient}', [DoctorController::class , 'store'])->name('doctor.add');

        Route::get('/add/{patient}', function () {
            return view('doctor.add-prescription');
        })->name('doctor.add.prescriptionToPatient');
    });
});







require __DIR__.'/auth.php';
