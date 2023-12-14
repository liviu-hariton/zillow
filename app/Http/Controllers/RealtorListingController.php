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
            'listings' => Auth::user()
                ->listings()
                ->filters($filters)
                ->get(),
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
