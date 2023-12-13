<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @property int $by_user_id
 * @property-read \App\Models\User $owner
 * @method static Builder|Listing whereByUserId($value)
 * @mixin \Eloquent
 */
	class Listing extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Listing> $listings
 * @property-read int|null $listings_count
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

