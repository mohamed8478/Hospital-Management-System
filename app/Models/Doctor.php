<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function prescription(){
        return $this->hasMany(Prescription::class);
    }

}
