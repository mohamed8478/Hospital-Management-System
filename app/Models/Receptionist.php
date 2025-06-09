<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    /** @use HasFactory<\Database\Factories\ReceptionistFactory> */
    use HasFactory;


    public function patient(){
        return $this->hasMany(Patient::class);
    }
}
