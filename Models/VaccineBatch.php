<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineBatch extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];

    public function vaccine(){
        return $this->belongsTo('App\Models\Vaccine');
    }
    public function healthcare_centre(){
        return $this->belongsTo('App\Models\HealthcareCentre');
    }

}
