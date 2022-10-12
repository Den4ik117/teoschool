<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
//        $news = Sensation::latest()->limit(3)->get();
//        $cheats = Cheat::latest()->limit(5)->get();
//        $courses = Course::all();

        return view('index');
    }
}
