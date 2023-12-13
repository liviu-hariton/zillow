<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'beds',
        'baths',
        'area',
        'city',
        'code',
        'street',
        'street_nr',
        'price'
    ];

    public function owner(): BelongsTo
    {
        // the second argument is the name of the foreign key column
        // if the foreign key column name is different from the default
        // 'by_user_id' is a foreign key column in the listings table (the current model)
        return $this->belongsTo(User::class, 'by_user_id');
    }
}
