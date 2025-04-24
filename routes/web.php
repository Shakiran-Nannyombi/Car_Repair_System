<?php

use App\Http\Controllers\Auth\RoleSelectionController;
use App\Http\Controllers\Auth\UnifiedLoginController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Role selection
Route::get('/register', [RoleSelectionController::class, 'show'])->name('register');

// Unified login
Route::get('/login', [UnifiedLoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [UnifiedLoginController::class, 'login'])->middleware('guest');
