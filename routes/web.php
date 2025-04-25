<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RoleSelectionController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Controllers\Auth\ServiceProviderRegisterController;
use App\Http\Controllers\Auth\UnifiedLoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Client\ClientInvoiceController;
use App\Http\Controllers\Client\ReviewController;
use App\Http\Controllers\Client\PaymentController as ClientPaymentController;
use App\Http\Controllers\Provider\ReceiptController as ProviderReceiptController;
use App\Http\Controllers\ProviderInvoiceController;
use App\Http\Controllers\Client\ClientAnalyticsController;
use App\Http\Controllers\Provider\AnalyticsController as ProviderAnalyticsController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Role selection
Route::get('/register', [RoleSelectionController::class, 'show'])->name('register');

// Client registration
Route::get('/register/client', [ClientRegisterController::class, 'create'])->name('register.client');
Route::post('/register/client', [ClientRegisterController::class, 'store']);

// Service provider registration
Route::get('/register/provider', [ServiceProviderRegisterController::class, 'create'])->name('register.provider');
Route::post('/register/provider', [ServiceProviderRegisterController::class, 'store']);

// Unified login
Route::get('/login', [UnifiedLoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [UnifiedLoginController::class, 'login'])->middleware('guest');

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Client protected routes
Route::middleware(['auth:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
    Route::get('/request', [RequestController::class, 'create'])->name('requests.create');
    Route::post('/request/filter', [RequestController::class, 'filterProviders'])->name('filter.providers');
    Route::post('/request/store', [RequestController::class, 'store'])->name('requests.store');
    Route::get('/request/filtered', [RequestController::class, 'showFilteredProviders'])->name('show.filtered.providers');
    
    // Notifications
    Route::get('/notifications', [ClientController::class, 'notifications'])->name('notifications');

    // Invoices
    Route::get('/invoices', [ClientInvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoice/{invoice}', [ClientInvoiceController::class, 'viewInvoice'])->name('invoice.view');
    Route::post('/invoice/{invoice}/confirm', [ClientInvoiceController::class, 'confirm'])->name('invoices.confirm');
    Route::post('/invoice/{invoice}/reject', [ClientInvoiceController::class, 'rejectInvoice'])->name('invoices.reject');
    Route::get('/invoices/pending', [ClientInvoiceController::class, 'pending'])->name('invoices.pending');
    
    // Payments
    Route::get('/invoice/{invoice}/pay', [ClientPaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [ClientPaymentController::class, 'store'])->name('payments.store');

    // Reviews
    Route::get('/reviews/{request}/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews/{request}/store', [ReviewController::class, 'store'])->name('reviews.store');
    Route::post('/submit-review', [ClientController::class, 'submitReview'])->name('submitReview');
    Route::get('/services/completed', [ClientController::class, 'completedServices'])->name('services.completed');
    Route::get('/client/invoices', [ClientInvoiceController::class, 'index'])->name('client.invoices.index');

    // Analytics
    Route::get('/analytics', [ClientAnalyticsController::class, 'index'])->name('analytics');
});

// Service provider protected routes
Route::middleware(['auth:provider'])->prefix('provider')->name('provider.')->group(function () {
    Route::get('/dashboard', [ServiceProviderController::class, 'index'])->name('dashboard');
    Route::patch('/request/{id}/complete', [ServiceProviderController::class, 'completeRequest'])->name('complete.request');
    Route::post('/requests/{requestId}/invoice', [ServiceProviderController::class, 'createInvoice'])->name('create.invoice');

    // Receipt management
    Route::get('/receipts', [ProviderReceiptController::class, 'index'])->name('receipts.index');
    Route::get('/receipts/{payment}', [ProviderReceiptController::class, 'show'])->name('receipts.show');
    Route::get('/pending-requests', [ServiceProviderController::class, 'showPendingRequests'])->name('pending-requests');

    // Analytics
    Route::get('/analytics', [ProviderAnalyticsController::class, 'index'])->name('analytics');
});

// Update appointment date for providers
Route::patch('/provider/appointment/{invoice}', [ProviderInvoiceController::class, 'updateAppointmentDate'])->name('provider.update.appointment');

// Static pages
Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');