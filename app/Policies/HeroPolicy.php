<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hero;
use Illuminate\Auth\Access\HandlesAuthorization;

class HeroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hero can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list heros');
    }

    /**
     * Determine whether the hero can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hero  $model
     * @return mixed
     */
    public function view(User $user, Hero $model)
    {
        return $user->hasPermissionTo('view heros');
    }

    /**
     * Determine whether the hero can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create heros');
    }

    /**
     * Determine whether the hero can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hero  $model
     * @return mixed
     */
    public function update(User $user, Hero $model)
    {
        return $user->hasPermissionTo('update heros');
    }

    /**
     * Determine whether the hero can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hero  $model
     * @return mixed
     */
    public function delete(User $user, Hero $model)
    {
        return $user->hasPermissionTo('delete heros');
    }

    /**
     * Determine whether the hero can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hero  $model
     * @return mixed
     */
    public function restore(User $user, Hero $model)
    {
        return false;
    }

    /**
     * Determine whether the hero can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hero  $model
     * @return mixed
     */
    public function forceDelete(User $user, Hero $model)
    {
        return false;
    }
}
