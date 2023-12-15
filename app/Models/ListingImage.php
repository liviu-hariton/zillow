<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingImage extends Model
{
    protected $fillable = ['filename'];

    // fields that should be appended to the model
    // this is useful when you want to add attributes to the model that are not in the database
    // in this case, we want to add the src attribute to the model
    // the 'src' is constructed in the get[Src]Attribute() method with kebab_case
    protected $appends = ['src'];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    // set the src attribute for the image
    public function getSrcAttribute(): string
    {
        return asset('storage/'.$this->filename);
    }
}
