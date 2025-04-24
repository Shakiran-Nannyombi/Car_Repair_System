<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Hash;

class UnifiedLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // use Breeze's login form
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Check if the email exists in the clients table
        $client = Client::where('email', $request->email)->first();
        if ($client && Hash::check($request->password, $client->password)) {
            Auth::guard('client')->login($client);
            return redirect()->intended('/client/dashboard');
        }

        // Check if the email exists in the service_providers table
        $provider = ServiceProvider::where('email', $request->email)->first();
        if ($provider && Hash::check($request->password, $provider->password)) {
            Auth::guard('provider')->login($provider);
            return redirect()->intended('/provider/dashboard');
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    
}
// Note: Ensure you have the necessary guards set up in your config/auth.php file for 'client' and 'provider'.