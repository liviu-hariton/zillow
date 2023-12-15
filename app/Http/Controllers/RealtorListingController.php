<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only([
                'by', 'order'
            ])
        ];

        return inertia('Realtor/Index', [
            'filters' => $filters,
            'listings' => Auth::user()
                ->listings()
                ->filters($filters)
                ->withCount('images')
                ->paginate(6)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Realtor/Create');
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
            ->route('realtor.listing.index')
            ->with('success', 'Listing created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Realtor/Edit', [
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
            ->route('realtor.listing.index')
            ->with('success', 'Listing updated.');
    }

    /**
     * @throws Throwable
     */
    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()
            ->back()
            ->with('success', 'Listing deleted.');
    }

    public function restore(Listing $listing)
    {
        $listing->restore();

        return redirect()->back()->with('success', 'Listing restored!');
    }
}
