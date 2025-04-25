<?php 
namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Request;
use Illuminate\Support\Collection;

class AnalyticsController extends Controller {
    public function index() {
        $provider = auth('provider')->user();
        
        // Get payments for this provider
        $payments = Payment::whereHas('invoice', function($query) use ($provider) {
            $query->whereHas('request', function($subquery) use ($provider) {
                $subquery->where('service_provider_id', $provider->id);
            });
        })->where('status', 'paid')->latest()->get();
        
        // Get requests for this provider
        $requests = Request::where('service_provider_id', $provider->id)->get();
        
        // Calculate payment statistics
        $totalEarnings = $payments->sum('amount');
        $paymentCount = $payments->count();
        $averagePayment = $paymentCount > 0 ? $totalEarnings / $paymentCount : 0;
        
        // Group payments by month for earnings chart
        $monthlyEarnings = $payments->groupBy(function($payment) {
            return $payment->created_at->format('F');
        })->map(function($monthPayments) {
            return $monthPayments->sum('amount');
        });
        
        // Group requests by month for requests chart
        $monthlyRequests = $requests->groupBy(function($request) {
            return $request->created_at->format('F');
        })->map(function($monthRequests) {
            return $monthRequests->count();
        });
        
        // Format monthly payments data for the payments chart
        $monthlyPayments = new Collection();
        foreach ($payments->groupBy(function($payment) {
            return $payment->created_at->format('F');
        }) as $month => $paymentGroup) {
            $monthlyPayments->push([
                'month' => $month,
                'total' => $paymentGroup->count() // Count of payments, not sum
            ]);
        }
        
        // Create analytics array with request statistics
        $analytics = [
            'total_requests' => $requests->count(),
            'completed_requests' => $requests->where('status', 'completed')->count(),
            'total_earnings' => $totalEarnings,
        ];
        
        return view('provider.analytics.index', compact(
            'analytics',
            'payments',
            'totalEarnings',
            'paymentCount',
            'averagePayment',
            'monthlyEarnings',
            'monthlyRequests',
            'monthlyPayments', // This was missing before
            'requests'
        ));
    }
}