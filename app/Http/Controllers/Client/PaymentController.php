<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Payment;
use App\Mail\PaymentReceiptMail;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function create(Invoice $invoice)
    {
        return view('client.payment_form', compact('invoice'));
    }

   public function store(Request $request)
{
    $request->validate([
        'invoice_id' => 'required|exists:invoices,id',
        'payment_method' => 'required|string',
        'payment_details' => 'required|string',
    ]);

    $invoice = Invoice::findOrFail($request->invoice_id);
    
    // Create the payment
    $payment = Payment::create([
        'invoice_id' => $request->invoice_id,
        'payment_method' => $request->payment_method,
        'payment_details' => $request->payment_details,
        'amount' => $invoice->amount,
        'status' => 'paid',
    ]);
    
    // Get the client
    $client = $invoice->client;
    
    // Get the service provider - use correct method name 'serviceProvider' (camelCase)
    $serviceProvider = $invoice->request->serviceProvider;
    
    // Send email if service provider exists and has email
    if ($serviceProvider && $serviceProvider->email) {
        Mail::to($serviceProvider->email)->send(
            new PaymentReceiptMail($payment, $invoice, $client)
        );
    }

    return redirect()->route('client.dashboard')->with('success', 'Payment initiated successfully and receipt sent to provider.');
}
}