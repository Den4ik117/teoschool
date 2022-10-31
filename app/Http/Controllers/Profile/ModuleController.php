<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function show(Course $course, Module $module)
    {
        return view('profile.modules.show', compact(['course', 'module']));
    }
}
