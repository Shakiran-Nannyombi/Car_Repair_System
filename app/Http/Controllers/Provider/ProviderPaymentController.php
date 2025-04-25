<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Mail\PaymentReceiptMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ProviderPaymentController extends Controller 
{
    /**
     * Store a new payment and automatically mark it as 'paid'.
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'nullable|string',
            'payment_details' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            // Create payment with status "paid"
            $payment = Payment::create([
                'invoice_id' => $request->invoice_id,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method ?? 'credit_card',
                'payment_details' => $request->payment_details,
                'status' => 'paid',
            ]);

            // Get associated invoice, service provider, and client
            $invoice = $payment->invoice;
            $serviceProvider = $invoice->service_provider;
            $client = $invoice->client;

            // Send receipt email to service provider
            if ($serviceProvider && $serviceProvider->email) {
                Mail::to($serviceProvider->email)->send(
                    new PaymentReceiptMail($payment, $invoice, $client)
                );
            }

            DB::commit();

            return redirect()->route('provider.receipts.show', $payment->id)
                ->with('success', 'Payment submitted successfully and receipt sent.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    // You can optionally still have a method to view the receipt
    public function showReceipt(Payment $payment)
    {
        return view('provider.receipts.show', compact('payment'));
    }
}