<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class ReceiptController extends Controller
{
    public function index()
    {
        // Get the authenticated service provider
        $provider = auth('provider')->user();
        
        // Get all paid payments related to this service provider
        $payments = Payment::whereHas('invoice', function($query) use ($provider) {
            $query->whereHas('request', function($subquery) use ($provider) {
                $subquery->where('service_provider_id', $provider->id);
            });
        })->where('status', 'paid')->latest()->get();
        
        return view('provider.receipts.index', compact('payments'));
    }
    
    public function show(Payment $payment)
    {
        // Get the authenticated service provider
        $provider = auth('provider')->user();
        
        // Verify this payment belongs to this service provider
        $paymentBelongsToProvider = $payment->invoice && 
                                   $payment->invoice->request && 
                                   $payment->invoice->request->serviceProvider && 
                                   $payment->invoice->request->serviceProvider->id === $provider->id;
        
        if (!$paymentBelongsToProvider) {
            abort(403, 'You do not have permission to view this receipt');
        }
        
        return view('provider.receipts.show', compact('payment'));
    }
}