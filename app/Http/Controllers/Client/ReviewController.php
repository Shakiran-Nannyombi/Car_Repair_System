<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Request as ServiceRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($requestId)
    {
        $request = ServiceRequest::with('serviceProvider')
                    ->where('id', $requestId)
                    ->where('client_id', Auth::guard('client')->id())
                    ->where('status', 'completed')
                    ->firstOrFail();
        
        return view('client.reviews.create', compact('request'));
    }
    
    public function store(Request $request, $requestId)
    {
        $data = $request->validate([
            'review_text' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        $serviceRequest = ServiceRequest::findOrFail($requestId);
        
        Review::create([
            'client_id' => Auth::guard('client')->id(),
            'service_provider_id' => $serviceRequest->service_provider_id,
            'review_text' => $data['review_text'],
            'rating' => $data['rating'],
        ]);
        
        return redirect()->route('client.services.completed')->with('success', 'Thank you for your review!');
    }
}