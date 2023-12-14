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

        $query = Listing::orderByDesc('created_at');

        // use ?? ( Null coalescing operator ) to check if the value is set,
        // if not use the default value (false)
        if($filters['priceFrom'] ?? false) {
            $query->where('price', '>=', $filters['priceFrom']);
        }

        if ($filters['priceTo'] ?? false) {
            $query->where('price', '<=', $filters['priceTo']);
        }

        if ($filters['beds'] ?? false) {
            $query->where('beds', $filters['beds']);
        }

        if ($filters['baths'] ?? false) {
            $query->where('baths', $filters['baths']);
        }

        if ($filters['areaFrom'] ?? false) {
            $query->where('area', '>=', $filters['areaFrom']);
        }

        if ($filters['areaTo'] ?? false) {
            $query->where('area', '<=', $filters['areaTo']);
        }

        return inertia('Listing/Index', [
            // pass the filters GET parameters to the view
            'filters' => $filters,
            'listings' => $query->paginate(10)
                // append the GET parameters to the pagination links
                // it will append only the parameters that have a value
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * Todo: add validation
         */
        // Create a new listing and associate it with the authenticated user
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required|string',
                'code' => 'required|string',
                'street' => 'required|string',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()
            ->route('listing.index')
            ->with('success', 'Listing created.');
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

        return inertia('Listing/Show', [
            'listing' => $listing,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit', [
            'listing' => $listing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        /**
         * Todo: add validation
         */
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required|string',
                'code' => 'required|string',
                'street' => 'required|string',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()
            ->route('listing.index')
            ->with('success', 'Listing updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()
            ->route('listing.index')
            ->with('success', 'Listing deleted.');
    }
}
