<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function show(Request $request, Course $course, Module $module, Part $part)
    {
        return view('profile.parts.show', compact(['course', 'module', 'part']));
    }
}
