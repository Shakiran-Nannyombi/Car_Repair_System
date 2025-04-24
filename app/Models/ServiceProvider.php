<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ServiceRequest;
class ServiceProvider extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'service_category',
        'image',
        'rating',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    // Relationship with the ServiceRequest model
    public function requests()
    {
        return $this->hasMany(Request::class, 'service_provider_id');
    }
    
    // Get payments through requests and invoices
    public function getPaymentsAttribute()
    {
        return Payment::whereHas('invoice', function($query) {
            $query->whereHas('request', function($subquery) {
                $subquery->where('service_provider_id', $this->id);
            });
        })->where('status', 'paid')->get();
    }
}