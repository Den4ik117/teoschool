<?php

namespace App\Traits;

use App\Enums\Role;

/**
 * @property Role role
 */
trait HasRoles
{
    public function isDeveloper(): bool
    {
        return $this->role === Role::Developer;
    }

    public function isAdministrator(): bool
    {
        return $this->role === Role::Administrator;
    }

    public function isCourseCreator(): bool
    {
        return $this->role === Role::CourseCreator;
    }

    public function isNewsWriter(): bool
    {
        return $this->role === Role::NewsWriter;
    }

    public function isCheatSheetWriter(): bool
    {
        return $this->role === Role::CheatSheetWriter;
    }

    public function isStudent(): bool
    {
        return $this->role === Role::Student;
    }
}
