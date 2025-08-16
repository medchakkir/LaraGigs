<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Display the 6 latest listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->take(6)->get()
        ]);
    }

    // Display a single listing
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }
}
