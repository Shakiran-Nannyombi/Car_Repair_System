<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_id',
        'amount',
        'status',
        'payment_method',
        'payment_details',
    ];

    /**
     * Get the invoice that owns the payment.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the client associated with this payment via the invoice.
     */
    public function client()
    {
        return $this->invoice ? $this->invoice->client : null;
    }

    /**
     * Get the service provider associated with this payment via the invoice.
     */
    public function serviceProvider()
    {
        return $this->invoice ? $this->invoice->serviceProvider : null;
    }
}
