<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Display the 6 latest listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // Display a single listing
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    // Show create listing form
    public function create()
    {
        return view('listings.create');
    }

    // Store listing
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required|max:255',
            'company' => ['required', 'max:255', Rule::unique('listings', 'company')],
            'location' => 'required|max:255',
            'website' => 'required|url|max:255',
            'email' => ['required', 'email', 'max:255'],
            'tags' => 'required|string|max:255',
            'description' => 'required|max:2000',
        ]);

        // Create listing
        Listing::create($formFields);

        // Redirect with success message
        return redirect('/')->with('message', 'Listing created successfully.');
    }
}
