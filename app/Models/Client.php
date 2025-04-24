<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;
    protected $guard = 'client';
    protected $fillable = [
        'name',
        'email',
        'password',
        'vehicle_type',
        'vehicle_registration_number',
        'gender',
        'location',
        'image', 
            ];

    protected $hidden = [
        'password',
    ];
}