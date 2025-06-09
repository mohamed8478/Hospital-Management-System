<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    /** @use HasFactory<\Database\Factories\PrescriptionFactory> */
    use HasFactory;
    protected $fillable = [
            'date_created',
            'patient_id',
            'doctor_id',
            'Duree_du_trait',
            'followup_date',
            'doctor_notes',
            'additional_instructions'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function medications(){
        return $this->belongsToMany(Medication::class, 'prescription_medicaments','prescription_id', 'medicament_id')->withPivot('quantity');
    }
}
