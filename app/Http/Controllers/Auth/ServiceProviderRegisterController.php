<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Hash;

class ServiceProviderRegisterController extends Controller
{
    public function create()
    {
        return view('auth.register-provider');
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:service_providers',
        'password' => 'required|confirmed|min:4',
        'location' => 'required|string|max:255',
        'service_category' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('providers', 'public');
    }

    $provider = ServiceProvider::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'location' => $validated['location'],
        'service_category' => $validated['service_category'],
        'rating' => 0,
        'image' => $imagePath,
    ]);

   

        auth()->guard('provider')->login($provider);

        return redirect()->route('provider.dashboard');
    }
}