<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = ['created_at', 'updated_at'];

    // mutator for password field
    public function setPasswordAttribute($pass){
        $this->attributes['password'] = Hash::make($pass);
    }
    
    public function getAuthPassword() {
        return $this->password;
    }
}
