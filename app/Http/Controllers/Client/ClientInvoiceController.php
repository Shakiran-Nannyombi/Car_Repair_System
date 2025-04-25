<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceStatusUpdated;

class ClientInvoiceController extends Controller
{
    // Method to display invoices
    public function index()
    {
        // Fetch invoices for the authenticated client with status 'pending'
        $invoices = Invoice::where('client_id', auth('client')->id())
                           ->where('status', 'pending')
                           ->get();
        
        // Return a view with the invoices
        return view('client.dashboard', compact('invoices'));
    }
    
    // Method to view a specific invoice
    public function viewInvoice(Invoice $invoice)
    {
        // Check if the authenticated client is the owner of the invoice
        if ($invoice->client_id !== auth('client')->id()) {
            abort(403); // Forbidden if client doesn't match
        }
        
        return view('client.dashboard', compact('invoice'));
    }
    
    // Method to confirm an invoice
    public function confirm(Invoice $invoice)
    {
        // Check if the authenticated client is the owner of the invoice
        if ($invoice->client_id !== auth('client')->id()) {
            abort(403); // Forbidden if client doesn't match
        }
        
        // Check if the invoice has a related request and service provider
        if ($invoice->request && $invoice->request->serviceProvider) {
            // Update the invoice status
            $invoice->update([
                'status' => 'confirmed'
            ]);
            
            // Send email to the service provider
            Mail::to($invoice->request->serviceProvider->email)
                ->send(new InvoiceStatusUpdated($invoice, 'confirmed'));
            
         return redirect()->route('client.payments.create', ['invoice' => $invoice->id]);
        } else {
            // Handle the case when there is no request or service provider
            return back()->with('error', 'Invoice request or service provider not found.');
        }
    }
    
    // Method to reject an invoice
    public function rejectInvoice(Invoice $invoice)
    {
        // Check if the authenticated client is the owner of the invoice
        if ($invoice->client_id !== auth('client')->id()) {
            abort(403); // Forbidden if client doesn't match
        }
        
        // Check if the invoice has a related request and service provider
        if ($invoice->request && $invoice->request->serviceProvider) {
            // Update the invoice status
            $invoice->update([
                'status' => 'rejected'
            ]);
            
            // Send email to the service provider
            Mail::to($invoice->request->serviceProvider->email)
                ->send(new InvoiceStatusUpdated($invoice, 'rejected'));
            
            return back()->with('success', 'Invoice rejected successfully.');
        } else {
            // Handle the case when there is no request or service provider
            return back()->with('error', 'Invoice request or service provider not found.');
        }

    }
    public function pending()
{
    $pendingInvoices = Invoice::where('client_id', auth()->id())
                              ->where('status', 'pending')
                              ->get();

    return view('client.invoices.pending', compact('pendingInvoices'));
}


   
}