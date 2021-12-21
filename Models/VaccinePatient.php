<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinePatient extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];

    public function vaccine_batch(){
        return $this->belongsTo('App\Models\VaccineBatch');
    }
    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}
