<?php
// app/Models/Request.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'client_id',
        'service_provider_id',
        'problem_description',
        'image',
        'location',
        'date_of_appointment',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    
    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id');
    }
    public function invoice()
{
    return $this->hasOne(\App\Models\Invoice::class);
}

}