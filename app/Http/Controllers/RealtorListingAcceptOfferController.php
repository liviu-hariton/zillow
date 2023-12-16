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

        $offer->listing->sold_at = now();
        $offer->listing->save();

        $offer->listing->offers()->except($offer)
            ->update(['rejected_at' => now()]);

        return redirect()
            ->route('realtor.listing.show', $offer->listing)
            ->with('success', 'Offer #'.$offer->id.' accepted, all other offers rejected');
    }
}
