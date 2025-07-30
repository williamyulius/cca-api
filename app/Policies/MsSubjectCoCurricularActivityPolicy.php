<?php

namespace App\Policies;

use App\Models\MsSubjectCoCurricularActivity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MsSubjectCoCurricularActivityPolicy
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
    public function view(User $user, MsSubjectCoCurricularActivity $msSubjectCoCurricularActivity): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MsSubjectCoCurricularActivity $msSubjectCoCurricularActivity): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MsSubjectCoCurricularActivity $msSubjectCoCurricularActivity): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MsSubjectCoCurricularActivity $msSubjectCoCurricularActivity): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MsSubjectCoCurricularActivity $msSubjectCoCurricularActivity): bool
    {
        return false;
    }
}
