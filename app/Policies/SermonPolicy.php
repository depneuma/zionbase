<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sermon;
use Illuminate\Auth\Access\HandlesAuthorization;

class SermonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the sermon can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list sermons');
    }

    /**
     * Determine whether the sermon can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sermon  $model
     * @return mixed
     */
    public function view(User $user, Sermon $model)
    {
        return $user->hasPermissionTo('view sermons');
    }

    /**
     * Determine whether the sermon can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create sermons');
    }

    /**
     * Determine whether the sermon can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sermon  $model
     * @return mixed
     */
    public function update(User $user, Sermon $model)
    {
        return $user->hasPermissionTo('update sermons');
    }

    /**
     * Determine whether the sermon can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sermon  $model
     * @return mixed
     */
    public function delete(User $user, Sermon $model)
    {
        return $user->hasPermissionTo('delete sermons');
    }

    /**
     * Determine whether the sermon can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sermon  $model
     * @return mixed
     */
    public function restore(User $user, Sermon $model)
    {
        return false;
    }

    /**
     * Determine whether the sermon can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Sermon  $model
     * @return mixed
     */
    public function forceDelete(User $user, Sermon $model)
    {
        return false;
    }
}
