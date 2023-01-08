<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('profile.courses.index', compact('courses'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request, Course $course)
    {
        if ($request->user()->wallet < $course->fee) {
            throw ValidationException::withMessages([
                'wallet' => 'На вашем счёте недостаточно средств!'
            ]);
        }

        if ($request->user()->courses->find($course->id)) {
            throw ValidationException::withMessages([
                'already_exists' => 'Вы уже записаны на этот курс!'
            ]);
        }

        $request->user()->courses()->attach($course);
        $request->user()->decrement('wallet', $course->fee);

        return to_route('profile.courses.index')->with('success', 'Вы успешно приобрели доступ на курс!');
    }

    public function show(Course $course)
    {
        return view('profile.courses.show', compact('course'));
    }

    public function awards()
    {
        return view('profile.awards');
    }
}
