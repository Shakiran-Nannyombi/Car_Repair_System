<?php

use App\Http\Controllers\Auth\RoleSelectionController;
use App\Http\Controllers\Auth\UnifiedLoginController;
use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Role selection
Route::get('/register', [RoleSelectionController::class, 'show'])->name('register');

// Unified login
Route::get('/login', [UnifiedLoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [UnifiedLoginController::class, 'login'])->middleware('guest');

//Contact 
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

//About
Route::get('/about', function () {
    return view('about');
});

//Services
Route::get('/services', function () {
    return view('services');
});