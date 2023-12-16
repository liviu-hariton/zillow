<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

// This is a Single Action Controller
class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $offer->update([
            'accepted_at' => now(),
        ]);

        $offer->listing->offers()
            ->except($offer)
            ->update([
                'rejected_at' => now(),
            ]);

        return redirect()
            ->route('realtor.listing.show', $offer->listing)
            ->with('success', 'Offer accepted!');
    }
}
