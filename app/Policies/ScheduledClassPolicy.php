<?php

namespace App\Policies;

use App\Models\ScheduledClass;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ScheduledClassPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ScheduledClass $scheduledClass): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

        if ($user->role === 'instructor') {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ScheduledClass $scheduledClass): Response
    {

        return $user->id === $scheduledClass->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ScheduledClass $scheduledClass): bool
    {
        return $user->id === $scheduledClass->instructor_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ScheduledClass $scheduledClass): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ScheduledClass $scheduledClass): bool
    {
        return false;
    }
}
