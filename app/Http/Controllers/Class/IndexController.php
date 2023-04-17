<?php

namespace App\Http\Controllers\Class;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user()->with(['person', 'person.classes', 'person.exercises'])->first();

        return view('class.index', compact(['user']));
    }
}
