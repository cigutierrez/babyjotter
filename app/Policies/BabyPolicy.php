<?php

namespace App\Policies;

use App\User;
use App\Baby;
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
     * @param  \App\Baby  $baby
     * @return mixed
     */
    public function view(User $user, Baby $baby)
    {
        return $user->id == $baby->user_id;
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
     * @param  \App\Baby  $Baby
     * @return mixed
     */
    public function update(User $user, Baby $baby)
    {
        return $user->id == $baby->user_id;
    }

    /**
     * Determine whether the user can delete the baby.
     *
     * @param  \App\User  $user
     * @param  \App\Baby  $baby
     * @return mixed
     */
    public function delete(User $user, Baby $baby)
    {
        return $user->id == $baby->user_id;
    }

    /**
     * Determine whether the user can restore the babies.
     *
     * @param  \App\User  $user
     * @param  \App\Baby  $baby
     * @return mixed
     */
    public function restore(User $user, Baby $baby)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the babies.
     *
     * @param  \App\User  $user
     * @param  \App\Baby  $baby
     * @return mixed
     */
    public function forceDelete(User $user, Baby $baby)
    {
        //
    }
}
