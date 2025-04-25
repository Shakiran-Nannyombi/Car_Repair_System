<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Request as ServiceRequest;
use App\Models\Review;

class ClientController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();

        $pendingInvoices = Invoice::where('client_id', $client->id)
                                  ->where('status', 'pending')
                                  ->get();

        $completedRequests = ServiceRequest::where('client_id', $client->id)
                                           ->where('status', 'completed')
                                           ->with('serviceProvider')
                                           ->get();

        return view('client.dashboard', compact('pendingInvoices', 'completedRequests'));
    }

    public function notifications()
    {
        $notifications = auth('client')->user()->notifications;
        return view('client.notifications', compact('notifications'));
    }

    public function viewInvoice(Invoice $invoice)
    {
        return view('client.invoice.view', compact('invoice'));
    }

    public function confirmInvoice(Invoice $invoice)
    {
        $invoice->status = 'confirmed';
        $invoice->save();

        return back()->with('success', 'Invoice confirmed.');
    }

    public function rejectInvoice(Invoice $invoice)
    {
        $invoice->status = 'rejected';
        $invoice->save();

        return back()->with('error', 'Invoice rejected.');
    }

    public function reports()
    {
        return view('client.reports');
    }
     
    public function completedServices()
{
    $client = auth('client')->user();
    
    $completedRequests = ServiceRequest::where('client_id', $client->id)
                                      ->where('status', 'complete')  // Make sure this matches your database
                                      ->with('serviceProvider')
                                      ->get();
    
    $pendingInvoices = Invoice::where('client_id', $client->id)
                             ->where('status', 'pending')
                             ->get();
    
                             return view('client.completed_services', compact('completedRequests', 'pendingInvoices'));
                            
}


    public function submitReview(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_provider_id' => 'required|exists:service_providers,id',
            'review_text' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($validated);

        return back()->with('success', 'Your review has been submitted!');
    }
}