<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function __construct()
    {
        // Only allow logged in users to create, edit, update and delete listings.
        // The index and show methods are public.
        $this->middleware('auth')->except(['index', 'show']);

        // Use the ListingPolicy to authorize the user for the current request
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return inertia('Listing/Index', [
            // pass the filters GET parameters to the view
            'filters' => $filters,
            'listings' => Listing::mostRecent() // defined as a scope in the Listing model
                ->filters($filters) // defined as a scope in the Listing model
                ->paginate(10)
                // append the GET parameters to the pagination links
                // it will append only the parameters that have a value
                ->withQueryString(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        // Method 1 for using Policies: use the ListingPolicy
        /*if(Auth::user()->cannot('view', $listing)) {
            abort(403);
        }*/

        // Method 2 for using Policies: use the ListingPolicy
        /*$this->authorize('view', $listing);*/

        $listing->load(['images']);

        $offer_made = !Auth::user() ? null : $listing->offers()->byMe()->first();

        return inertia('Listing/Show', [
            'listing' => $listing,
            'offerMade' => $offer_made,
        ]);
    }
}
