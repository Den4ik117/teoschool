<?php

namespace App\Policies;

use App\Models\Module;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isCourseCreator();
    }

    public function create(User $user): bool
    {
        return $user->isCourseCreator();
    }

    public function update(User $user, Module $module): bool
    {
        return $user->isCourseCreator();
    }

    public function delete(User $user, Module $module): bool
    {
        return $user->isCourseCreator();
    }
}
