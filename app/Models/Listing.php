<?php

namespace App\Models;

use Database\Factories\ListingFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Listing
 *
 * @property int $id
 * @property int $beds
 * @property int $baths
 * @property int $area
 * @property string $city
 * @property string $code
 * @property string $street
 * @property string $street_nr
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static ListingFactory factory($count = null, $state = [])
 * @method static Builder|Listing newModelQuery()
 * @method static Builder|Listing newQuery()
 * @method static Builder|Listing query()
 * @method static Builder|Listing whereArea($value)
 * @method static Builder|Listing whereBaths($value)
 * @method static Builder|Listing whereBeds($value)
 * @method static Builder|Listing whereCity($value)
 * @method static Builder|Listing whereCode($value)
 * @method static Builder|Listing whereCreatedAt($value)
 * @method static Builder|Listing whereId($value)
 * @method static Builder|Listing wherePrice($value)
 * @method static Builder|Listing whereStreet($value)
 * @method static Builder|Listing whereStreetNr($value)
 * @method static Builder|Listing whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
