<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    /** @use HasFactory<\Database\Factories\MedicationFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'expiry_date',
        'pharmacists_id'
    ];

    public function pharmacist(){
        return $this->hasMany(Pharmacist::class);
    }

    public function prescription(){
        return $this->belongsToMany(Prescription::class)->withPivot('quantity');
    }
}
