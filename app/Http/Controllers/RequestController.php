<?php
// app/Http/Controllers/RequestController.php
namespace App\Http\Controllers;

use App\Models\Request as ServiceRequest;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function create()
    {
        return view('client.request.create');
    }
    public function filterProviders(Request $request)
    {
        // Remove the image from the session data
        $requestData = $request->except('image');
    
        // Find matching providers
        $providers = ServiceProvider::where('location', $request->location)
            ->where('service_category', $request->service_category)
            ->get();
    
        // Store only the necessary data in session
        session(['filter_data' => $requestData, 'filtered_providers' => $providers]);
    
        // Redirect to GET route instead of directly returning view
        return redirect()->route('client.show.filtered.providers');
    }
    
    public function showFilteredProviders()
    {
        $providers = session('filtered_providers', []);
        $details = session('filter_data', []);
        
        return view('client.request.select-provider', [
            'providers' => $providers,
            'details' => $details
        ]);
    }
  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'problem_description' => 'required|string',
            'location' => 'required|string',
            'service_category' => 'required|string',
            'service_provider_id' => 'required|exists:service_providers,id',
            'image' => 'nullable|image|max:2048',
            'date_of_appointment' => 'required|date|after_or_equal:today',
        ]);

        $client = Auth::guard('client')->user();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('requests', 'public');
        } else {
            $imagePath = null;
        }

        $newRequest = ServiceRequest::create([
            'client_id' => $client->id,
            'service_provider_id' => $request->service_provider_id,
            'problem_description' => $request->problem_description,
            'image' => $imagePath,
            'location' => $request->location,
            'date_of_appointment' => $request->date_of_appointment,
        ]);

        // Send email to service provider
        $provider = \App\Models\ServiceProvider::find($request->service_provider_id);
        Mail::to($provider->email)->send(new \App\Mail\ServiceRequestMail($newRequest));

        return redirect()->route('client.dashboard')->with('success', 'Request submitted successfully.');
    }
}