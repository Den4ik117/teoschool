<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\Part;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Course::class);
    }

    public function index()
    {
        $courses = Course::all();

        return view('dashboard.courses.index', compact('courses'));
    }

    public function create()
    {
        $parts = Part::cases();

        return view('dashboard.courses.create', compact('parts'));
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->validated());

        return to_route('dashboard.courses.index')->with('success', __('messages.dashboard.courses.created'));
    }

    public function edit(Course $course)
    {
        $parts = Part::cases();

        return view('dashboard.courses.edit', compact(['course', 'parts']));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return to_route('dashboard.courses.index')->with('success', __('messages.dashboard.courses.updated'));
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return to_route('dashboard.courses.index')->with('success', __('messages.dashboard.courses.deleted'));
    }
}
