<?php

namespace App\Policies;

use App\Models\EtatCivil;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EtatCivilPolicy
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
    public function view(User $user, EtatCivil $etatCivil): bool
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
    public function update(User $user, EtatCivil $etatCivil): bool
    {
        return $user->name === 'admin';
    }

    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, EtatCivil $etatCivil): bool
    {
        return $user->name === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EtatCivil $etatCivil): bool
    {
        return $user->name === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EtatCivil $etatCivil): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EtatCivil $etatCivil): bool
    {
        //
    }
}
