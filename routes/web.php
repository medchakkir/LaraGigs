<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

// All listings
Route::get('/', [ListingController::class, 'index']);

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->where('listing', '[0-9]+');

// Show create listing form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware(['auth', 'can:update,listing']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware(['auth', 'can:update,listing']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware(['auth', 'can:delete,listing']);

// Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show register/create form
Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Logout
Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');
