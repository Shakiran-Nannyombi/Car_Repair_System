<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Request as ServiceRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestCompleted;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestCompletedNotification;
use App\Notifications\InvoiceCreatedNotification;
use App\Models\Invoice;
use App\Mail\InvoiceCreated;
use App\Mail\InvoiceStatusUpdated;
use App\Models\Receipt;
use App\Models\Payment;


class ServiceProviderController extends Controller
{
    public function index()
    {
        $providerId = auth('provider')->id();
        $receipts = Receipt::where('provider_id', $providerId)->get();

        $paymentsCount = Payment::whereHas('invoice', function ($query) use ($providerId) {
            $query->whereHas('request', function ($subquery) use ($providerId) {
                $subquery->where('service_provider_id', $providerId);
            });
        })->where('status', 'paid')->count();

        return view('provider.dashboard', compact('receipts', 'paymentsCount'));
    }

    // New page to view pending requests
    public function showPendingRequests()
{
    // Get the currently authenticated provider's ID
    $providerId = Auth::guard('provider')->id();

    // Retrieve pending service requests for this provider, with client and invoice data
    $pendingRequests = ServiceRequest::where('service_provider_id', $providerId)
        ->where('status', 'pending')
        ->with(['client', 'invoice'])
        ->get();

    // Pass data to the view
    return view('provider.pending-requests', compact('pendingRequests'));
}
    public function profile()
    {
        return view('provider.profile');
    }

    public function jobs()
    {
        return view('provider.jobs');
    }

    public function completeRequest($id)
    {
        $request = ServiceRequest::with('client')->findOrFail($id);
    
        if (!$request->client) {
            return back()->with('error', 'No client found for this request.');
        }
    
        // Update status
        $request->status = 'complete';
        $request->save();
    
        // Send email
        Mail::to($request->client->email)->send(new RequestCompleted($request));
    
        // Send notification
        Notification::send($request->client, new RequestCompletedNotification($request));
    
        return redirect()->route('provider.dashboard')->with('success', 'Request marked as complete!');
    }
    
    public function createInvoice(Request $request, $requestId)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'amount' => 'required|numeric|min:0',
        'date_option' => 'nullable|in:keep,change',
        'original_date' => 'nullable|date',
        'new_appointment_date' => 'nullable|date',
    ]);

    // Fetch the related service request
    $serviceRequest = ServiceRequest::findOrFail($requestId);

    // Ensure the service request has an associated client
    if (!$serviceRequest->client) {
        return back()->with('error', 'No associated client for this request.');
    }

    // Determine the appointment date based on the selection
    $appointmentDate = null;
    if (isset($validated['date_option']) && $validated['date_option'] === 'keep') {
        $appointmentDate = $validated['original_date'];
    } elseif (isset($validated['new_appointment_date'])) {
        $appointmentDate = $validated['new_appointment_date'];
    }

    // Create the invoice
    $invoice = new Invoice();
    $invoice->request_id = $serviceRequest->id;
    $invoice->client_id = $serviceRequest->client_id;
    $invoice->amount = $validated['amount'];
    $invoice->appointment_date = $appointmentDate;
    $invoice->status = 'pending'; // Default status
    $invoice->save();

    // Send email to client
    $client = $serviceRequest->client;
    Mail::to($client->email)->send(new InvoiceCreated($invoice));

    // Send notification to client (optional)
    Notification::send($client, new InvoiceCreatedNotification($invoice));

    return back()->with('success', 'Invoice created with appointment date and sent to client.');
}
    public function updateInvoiceStatus(Request $request, $invoiceId)
    {
        $request->validate([
            'status' => 'required|in:confirmed,rejected',
        ]);

        $invoice = Invoice::with('request.serviceProvider')->findOrFail($invoiceId);

        $invoice->status = $request->status;
        $invoice->save();

        $provider = $invoice->request->serviceProvider;

        if ($provider && $provider->email) {
            try {
                Mail::to($provider->email)->send(new InvoiceStatusUpdated($invoice, $request->status)); // Send to service provider
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to send email to service provider: ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Invoice status updated and provider notified.');
    }
}