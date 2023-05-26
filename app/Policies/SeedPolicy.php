<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Seed;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use function Symfony\Component\Translation\t;

class SeedPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seed  $seed
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Seed $seed)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->role_id == Role::ADMIN->value || $user->role_id == Role::MANAGER->value) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seed  $seed
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Seed $seed)
    {
        if ($user->role_id == Role::ADMIN->value || $user->role_id == Role::MANAGER->value || $user->role_id ==
            Role::CONTENT_WRITER->value) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seed  $seed
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Seed $seed)
    {
        if ($user->role_id == Role::ADMIN->value || $user->role_id == Role::MANAGER->value) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seed  $seed
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Seed $seed)
    {
        if ($user->role_id == Role::ADMIN->value || $user->role_id == Role::MANAGER->value) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seed  $seed
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Seed $seed)
    {
        if ($user->role_id == Role::ADMIN->value || $user->role_id == Role::MANAGER->value) {
            return true;
        }

        return false;
    }
}
