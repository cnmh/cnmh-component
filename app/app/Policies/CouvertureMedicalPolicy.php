<?php

namespace App\Policies;

use App\Models\CouvertureMedical;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CouvertureMedicalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CouvertureMedical $couvertureMedical): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->name === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CouvertureMedical $couvertureMedical): bool
    {
        return $user->name === 'admin';
    }

     /**
     * Determine whether the user can update the model.
     */
    public function edit(User $user, CouvertureMedical $couvertureMedical): bool
    {
        return $user->name === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CouvertureMedical $couvertureMedical): bool
    {
        return $user->name === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CouvertureMedical $couvertureMedical): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CouvertureMedical $couvertureMedical): bool
    {
        //
    }
}
