<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{
    // This method is called before any other methods
    // and can be used to allow admins to do anything
    // or to allow admins to perform the specified ability
    public function before(?User $user, $ability)
    {
        // Allow admins to do anything
        if($user->is_admin) {
            return true;
        }

        // Allow admins to perform the specified ability (delete in this case
        /*if($user->is_admin && $ability === 'delete') {
            return true;
        }*/
    }

    /**
     * Determine whether the user can view any models.
     */
    // ? means that the user can be null
    // (aka not logged in aka guest)
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    // ? means that the user can be null
    // (aka not logged in aka guest)
    public function view(?User $user, Listing $listing): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): bool
    {
        // Only allow the user who created the listing to update it
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing): bool
    {
        // Only allow the user who created the listing to soft-delete it
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): bool
    {
        // Only allow the user who created the listing to restore it
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        // Only allow the user who created the listing to delete it
        return $user->id === $listing->by_user_id;
    }
}
