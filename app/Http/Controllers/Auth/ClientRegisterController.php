<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientRegisterController extends Controller
{
    public function create()
    {
        return view('auth.register-client');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed|min:6',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_registration_number' => 'required|string|max:255',
            'gender' => 'required|string',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Allow optional image upload
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('clients', 'public');
        }
    
        $client = Client::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'vehicle_type' => $validated['vehicle_type'],
            'vehicle_registration_number' => $validated['vehicle_registration_number'],
            'gender' => $validated['gender'],
            'location' => $validated['location'],
            'image' => $imagePath,
        ]);
        auth()->guard('client')->login($client);

        return redirect()->route('client.dashboard');
         // or client dashboard
    }
}