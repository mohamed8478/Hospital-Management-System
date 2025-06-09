<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'gender', 'phone_num', 'email', 'address',
        'chronic_conditions', 'recep_id','maladies'
    ];

    public function receptionist(){
        return $this->belongsTo(Receptionist::class);
    }
    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
}

