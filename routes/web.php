<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

// All listings
Route::get('/', [ListingController::class, 'index']);

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->where('listing', '[0-9]+');

// Show create listing form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing
Route::post('/listings', [ListingController::class, 'store']);
