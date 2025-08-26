<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ListingController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display the 6 latest listings
     */
    public function index(): View
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    /**
     * Display a single listing
     */
    public function show(Listing $listing): View
    {
        return view('listings.show', ['listing' => $listing]);
    }

    /**
     * Show create listing form
     */
    public function create(): View
    {
        $this->authorize('create', Listing::class);

        return view('listings.create');
    }

    /**
     * Store listing
     */
    public function store(StoreListingRequest $request): RedirectResponse
    {
        $this->authorize('create', Listing::class);

        $formFields = $request->validated();

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        // Create listing
        Listing::create($formFields);

        // Redirect with success message
        return redirect('/')->with('message', 'Listing created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(Listing $listing): View
    {
        $this->authorize('update', $listing);

        return view('listings.edit', ['listing' => $listing]);
    }

    /**
     * Update listing
     */
    public function update(UpdateListingRequest $request, Listing $listing): RedirectResponse
    {
        $this->authorize('update', $listing);

        $formFields = $request->validated();

        if ($request->hasFile('logo')) {
            if ($listing->logo) {
                Storage::disk('public')->delete($listing->logo);
            }
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Update listing
        $listing->update($formFields);

        // Redirect with success message
        return back()->with('message', 'Listing updated successfully.');
    }

    /**
     * Delete listing
     */
    public function destroy(Listing $listing): RedirectResponse
    {
        $this->authorize('delete', $listing);

        if ($listing->logo) {
            Storage::disk('public')->delete($listing->logo);
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully.');
    }

    /**
     * Manage listings
     */
    public function manage(): View
    {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }
}
