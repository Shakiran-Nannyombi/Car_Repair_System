<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function client()
    {
        return view('client.dashboard');
    }

    public function provider()
    {
        return view('provider.dashboard');
    }
}