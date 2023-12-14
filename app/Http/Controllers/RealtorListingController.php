<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Throwable;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index()
    {
        return inertia('Realtor/Index', [
            'listings' => auth()->user()->listings,
        ]);
    }

    public function edit(Listing $listing)
    {

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
}
