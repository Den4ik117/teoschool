<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sensation;
use App\Models\Cheat;
use App\Models\Course;

class HomeController extends Controller
{
    public function showMain(Request $request)
    {
        $news = Sensation::latest()->limit(3)->get();
        $cheats = Cheat::latest()->limit(5)->get();
        $courses = Course::all();

        return view('index', [
            'news' => $news,
            'cheats' => $cheats,
            'courses' => $courses
        ]);
    }

    public function sendCourses(Request $request)
    {
        $courses = Course::all();

        return $courses->toJson();
    }
    
    public function sendNews(Request $request)
    {
        $news = Sensation::latest()->limit(24)->get();

        return $news->toJson();
    }

    public function sendCheats(Request $request)
    {
        $cheats = Cheat::latest()->limit(8)->get();

        return $cheats->toJson();
    }

    public function sendAnyCheats(Request $request)
    {
        if ($request->search == '')
        {
            return Cheat::latest()->limit(8)->get()->toJson();
        }

        $cheats = Cheat::where('name', 'like', '%' . $request->search . '%')->get();
        
        return $cheats->toJson();
    }
}
