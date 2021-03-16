<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensation;
use App\Models\Course;
use App\Models\Lesson;

class ArticleController extends Controller
{
    public function showNew(Request $request, $new_id)
    {
        $new = Sensation::find($new_id);

        if (!$new) return back();

        return view('new', ['new' => $new]);
    }

    public function showLesson(Request $request, $course_url, $lesson_url)
    {
        $course = Course::where('url', $course_url)->first();
        if (!$course) return redirect()->route('home');
        
        $lesson = Lesson::where('url', $lesson_url)->first();
        if (!$lesson || !$lesson->publish) return redirect()->route('home');

        return view('article', [
            'course' => $course,
            'lesson' => $lesson
        ]);
    }
}
