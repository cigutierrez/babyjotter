<?php

namespace App\Policies;

use App\User;
use App\Babies;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any babies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the babies.
     *
     * @param  \App\User  $user
     * @param  \App\Babies  $babies
     * @return mixed
     */
    public function view(User $user, Babies $babies)
    {
        return $user->id == $babies->user_id;
    }

    /**
     * Determine whether the user can create babies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the babies.
     *
     * @param  \App\User  $user
     * @param  \App\Babies  $babies
     * @return mixed
     */
    public function update(User $user, Babies $babies)
    {
        //
    }

    /**
     * Determine whether the user can delete the babies.
     *
     * @param  \App\User  $user
     * @param  \App\Babies  $babies
     * @return mixed
     */
    public function delete(User $user, Babies $babies)
    {
        //
    }

    /**
     * Determine whether the user can restore the babies.
     *
     * @param  \App\User  $user
     * @param  \App\Babies  $babies
     * @return mixed
     */
    public function restore(User $user, Babies $babies)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the babies.
     *
     * @param  \App\User  $user
     * @param  \App\Babies  $babies
     * @return mixed
     */
    public function forceDelete(User $user, Babies $babies)
    {
        //
    }
}
