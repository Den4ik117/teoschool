<?php

namespace App\Policies;

use App\Models\Cheatsheet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheatsheetPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isCourseCreator() || $user->isCheatSheetWriter();
    }

    public function create(User $user): bool
    {
        return $user->isCourseCreator() || $user->isCheatSheetWriter();
    }

    public function update(User $user, Cheatsheet $cheatsheet): bool
    {
        return $user->isCourseCreator() || $user->isCheatSheetWriter();
    }

    public function delete(User $user, Cheatsheet $cheatsheet): bool
    {
        return $user->isCourseCreator() || $user->isCheatSheetWriter();
    }
}