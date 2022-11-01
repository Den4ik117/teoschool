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
        $tasks = [];
        foreach ($part->tasks()->get() as $task) {
            $tasks[] = [
                'id' => $task->id,
                'type' => $task->type,
                'name' => $task->name,
                'options' => json_decode($task->options),
            ];
        }
        $tasks = json_encode($tasks);

        return view('profile.parts.show', compact(['course', 'module', 'part', 'tasks']));
    }
}
