<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareCentre extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];

    public function healthcare_staff(){
        return $this->hasMany('App\Models\HealthcareStaff');
    }
}
