<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Sensation;
use App\Models\Cheat;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function showRoles(Request $request)
    {
        return view('admin.roles', [
            'users' => User::latest()->limit(10)->get(),
            'roles' => Role::all()
        ]);
    }

    public function verifyAccount(Request $request)
    {
        $request->validate([
            'user_id' => 'required'
        ]);

        if (!\Auth::user()->hasPermissionTo('verify accounts'))
        {
            return back()->withErrors(['deny' => 'У вас нет разрешения верифицировать аккаунты!']);
        }

        $user = User::find($request->user_id);
        if ($user)
        {
            $user->user_verified = true;
            $user->save();
            return back()->with(['success' => 'Пользователь успешно верифицирован!']);
        }

        return back()->withErrors(['not found' => 'Пользователь с таким ID не найден!']);
    }

    public function addRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_name' => 'required'
        ]);

        $user = User::find($request->user_id);
        if ($user)
        {
            $user->assignRole($request->role_name);
            $user->save();
            return back()->with(['success' => 'Роль успешно добавлена!']);
        }

        return back()->withErrors(['not found' => 'Пользователь с таким ID не найден!']);
    }

    public function removeRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_name' => 'required'
        ]);

        $user = User::find($request->user_id);
        if ($user)
        {
            $user->removeRole($request->role_name);
            $user->save();
            return back()->with(['success' => 'Роль успешно снята!']);
        }

        return back()->withErrors(['not found' => 'Пользователь с таким ID не найден!']);
    }

    public function showCourses(Request $request)
    {
        return view('admin.courses', [
            'courses' => Course::all()
        ]);
    }
    
    public function createCourse(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_url' => 'required',
            'url' => 'required'
        ]);

        $course = Course::create([
            'name' => $request->name,
            'course_url' => $request->course_url,
            'url' => $request->url
        ]);

        return back()->with(['success' => 'Курс успешно добавлен!']);
    }

    public function showCourse(Request $request, $course_id)
    {
        $course = Course::find($course_id);

        if ($course)
        {
            return view('admin.course', ['course' => $course]);
        }

        return back()->withErrors(['Not found' => 'Курс не найден!']);
    }

    public function editCourse(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'name' => 'required',
            'course_url' => 'required'
        ]);
        
        $course = Course::find($request->course_id);
        if (!$course)
        {
            return back()->withErrors(['Not found' => 'Неверный ID курса!']);
        }

        $course->name = $request->name;
        $course->course_url = $request->course_url;
        $course->save();

        return redirect()->route('admin-courses')->with(['success' => 'Информация о курсе успешно обновлена!']);
    }

    public function deleteCourse(Request $request)
    {
        $request->validate([
            'course_id' => 'required'
        ]);
        
        $course = Course::find($request->course_id);
        if (!$course)
        {
            return back()->withErrors(['Not found' => 'Некорректный ID курса!']);
        }

        $course->delete();

        return back()->with(['success' => 'Курс успешно удалён!']);
    }

    public function writeLesson(Request $request)
    {
        $courses = Course::all();

        return view('admin.write_lesson', ['courses' => $courses]);
    }

    public function createLesson(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'url' => 'required',
            'content' => 'required'
        ]);

        $lesson = Lesson::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_url' => $request->image_url,
            'prev_lesson' => $request->prev_lesson,
            'next_lesson' => $request->next_lesson,
            'url' => $request->url,
            'content' => $request->content,
            'publish' => $request->publish ? true : false
        ]);

        return back()->with(['success' => 'Урок успешно создан!']);
    }

    public function showLessons(Request $request)
    {
        $lessons = Lesson::all();

        return view('admin.lessons', ['lessons' => $lessons]);
    }

    public function showOneLesson(Request $request, $lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        $courses = Course::all();

        if (!$lesson)
        {
            return back()->withErrors(['not found' => 'Урок не найден!']);
        }

        return view('admin.edit_lesson', ['lesson' => $lesson, 'courses' => $courses]);
    }

    public function editLesson(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required',
            'course_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'url' => 'required',
            'content' => 'required'
        ]);
        
        $lesson = Lesson::find($request->lesson_id);
        $lesson->course_id = $request->course_id; 
        $lesson->title = $request->title; 
        $lesson->subtitle = $request->subtitle; 
        $lesson->image_url = $request->image_url; 
        $lesson->prev_lesson = $request->prev_lesson; 
        $lesson->next_lesson = $request->next_lesson; 
        $lesson->url = $request->url; 
        $lesson->content = $request->content; 
        $lesson->publish = $request->publish ? true : false;
        $lesson->save();

        return redirect()->route('admin-lessons')->with(['success' => 'Урок успешно изменён!']);
    }

    public function deleteLesson(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|exists:lessons,id'
        ]);
        
        $lesson = Lesson::find($request->lesson_id);

        $lesson->delete();

        return back()->with(['success' => 'Урок успешно удалён!']);
    }

    public function showNews(Request $request)
    {
        $news = Sensation::all();

        return view('admin.news', ['news' => $news]);
    }

    public function createNew(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_url' => 'required'
        ]);

        $lesson = Sensation::create([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'content' => $request->content
        ]);

        return back()->with(['success' => 'Новость успешно создана!']);
    }

    public function showNew(Request $request, $new_id)
    {
        $new = Sensation::find($new_id);

        if (!$new)
        {
            return back()->withErrors(['not found' => 'Новость не найдена!']);
        }

        return view('admin.new', ['new' => $new]);
    }
    
    public function deleteNew(Request $request)
    {
        $request->validate([
            'new_id' => 'required|exists:sensations,id'
        ]);
        
        $new = Sensation::find($request->new_id);

        $new->delete();

        return back()->with(['success' => 'Новость успешно удалёна!']);
    }

    public function editNew(Request $request)
    {
        $request->validate([
            'new_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image_url' => 'required'
        ]);

        $lesson = Sensation::find($request->new_id);
        $lesson->title = $request->title;
        $lesson->image_url = $request->image_url;
        $lesson->content = $request->content;
        $lesson->save();

        return redirect()->route('admin-news')->with(['success' => 'Новость успешно изменена!']);
    }

    public function showCheats(Request $request)
    {
        $cheats = Cheat::all();

        return view('admin.cheats', ['cheats' => $cheats]);
    }

    public function createCheat(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'url' => 'required'
        ]);

        Cheat::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'url' => $request->url
        ]);

        return back()->with(['success' => 'Шпаргалка успешно создана!']);
    }

    public function showCheat(Request $request, $cheat_id)
    {
        $cheat = Cheat::find($cheat_id);

        if (!$cheat)
        {
            return back()->withErrors(['not found' => 'Шпаргалка не найдена!']);
        }

        return view('admin.cheat', ['cheat' => $cheat]);
    }

    public function editCheat(Request $request)
    {
        $request->validate([
            'cheat_id' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'url' => 'required'
        ]);

        $cheat = Cheat::find($request->cheat_id);
        $cheat->name = $request->name;
        $cheat->subject = $request->subject;
        $cheat->url = $request->url;
        $cheat->save();

        return redirect()->route('admin-cheats')->with(['success' => 'Шпаргалка успешно изменена!']);
    }

    public function deleteCheat(Request $request)
    {
        $request->validate([
            'cheat_id' => 'required|exists:cheats,id'
        ]);
        
        Cheat::find($request->cheat_id)->delete();

        return back()->with(['success' => 'Шпаргалка успешно удалена!']);
    }
}
