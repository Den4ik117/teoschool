<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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

    public function update(User $user, Course $course): bool
    {
        return $user->isCourseCreator();
    }

    public function delete(User $user, Course $course): bool
    {
        return $user->isCourseCreator();
    }
}
