<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

//    public function before($user){
//        if($user->isSuperAdmin()){
//            return true;
//        }
//        return null;
//    }

    /**
     * Determine whether the user can view any ads.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user=null)
    {
        return true;
    }

    /**
     * Determine whether the user can view the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function view(User $user, Ad $ad)
    {
        return $user->id === $ad->user_id;
    }

    /**
     * Determine whether the user can create ads.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id === 10;
    }

    /**
     * Determine whether the user can update the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Ad  $ad
     * @return mixed
     */
    public function update(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can delete the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Ad  $ad
     * @return mixed
     */
    public function delete(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can restore the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Ad  $ad
     * @return mixed
     */
    public function restore(User $user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Ad  $ad
     * @return mixed
     */
    public function forceDelete(User $user, Ad $ad)
    {
        //
    }
}
