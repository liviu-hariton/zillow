<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        // eager load the images relationship
        $listing->load(['images']);

        return inertia('Realtor/ListingImage/Create', [
            'listing' => $listing
        ]);
    }

    public function store(Listing $listing, Request $request)
    {
        if($request->hasFile('images')) {
            // validate the images
            $request->validate(
                [
                    'images.*' => 'mimes:jpg,jpeg,png|max:5000'
                ],
                // custom error messages
                [
                    'images.*.mimes' => 'Only JPEG, JPG or PNG images are allowed',
                    'images.*.max' => 'Sorry! Maximum allowed size for an image is 5MB'
                ]
            );

            foreach($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded!');
    }

    public function destroy($listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);

        $image->delete();

        return redirect()->back()->with('success', 'Image deleted!');
    }
}
