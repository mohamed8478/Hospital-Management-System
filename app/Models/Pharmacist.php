<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    /** @use HasFactory<\Database\Factories\PharmacistFactory> */
    use HasFactory;

    public function medication(){
        return $this->belongsTo(Medication::class);
    }

}
