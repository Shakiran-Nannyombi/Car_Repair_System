<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'amount',
        'status',
        'client_id', // include this if you're using mass assignment
        'appointment_date',
    ];

    // Relationship with the Request model (not ServiceProvider)
    public function request()
    {
        return $this->belongsTo(\App\Models\Request::class);
    }
    
    
    

    // Relationship with the Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Relationship with Service Provider (assuming service_provider_id is the column for service provider in invoices table)
    public function service_provider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }

    // Check if the invoice is confirmed
    public function isConfirmed()
    {
        return $this->status === 'confirmed';
    }
}