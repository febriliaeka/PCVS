<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];

    public function vaccine_batch(){
        return $this->hasMany('App\Models\VaccineBatch');
    }
}
