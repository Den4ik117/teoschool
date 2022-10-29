<?php

namespace App\Policies;

use App\Models\Part;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartPolicy
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

    public function update(User $user, Part $part): bool
    {
        return $user->isCourseCreator();
    }

    public function delete(User $user, Part $part): bool
    {
        return $user->isCourseCreator();
    }
}
