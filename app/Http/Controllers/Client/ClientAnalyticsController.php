<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Request as ServiceRequest;

class ClientAnalyticsController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();

        $requests = ServiceRequest::where('client_id', $client->id)->get();
        $invoices = Invoice::where('client_id', $client->id)->get();

        $requestCount = $requests->count();
        $completedRequests = $requests->where('status', 'completed')->count();
        $pendingRequests = $requests->where('status', 'pending')->count();

        $totalPayments = $invoices->where('status', 'confirmed')->sum('amount');
        $pendingPayments = $invoices->where('status', 'pending')->sum('amount');

        return view('client.analytics', compact(
            'requestCount',
            'completedRequests',
            'pendingRequests',
            'totalPayments',
            'pendingPayments'
        ));
    }
}