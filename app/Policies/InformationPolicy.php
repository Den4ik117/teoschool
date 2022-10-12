<?php

namespace App\Policies;

use App\Models\Information;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InformationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isCourseCreator() || $user->isNewsWriter();
    }

    public function create(User $user): bool
    {
        return $user->isCourseCreator() || $user->isNewsWriter();
    }

    public function update(User $user, Information $information): bool
    {
        return $user->isCourseCreator() || $user->isNewsWriter();
    }

    public function delete(User $user, Information $information): bool
    {
        return $user->isCourseCreator() || $user->isNewsWriter();
    }
}
