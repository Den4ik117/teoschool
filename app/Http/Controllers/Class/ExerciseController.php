<?php

namespace App\Http\Controllers\Class;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function show(Request $request, $uuid)
    {
        $exercise = Exercise::query()->where('uuid', $uuid)->firstOrFail();
        $user = $request->user()->with(['person'])->first();

        return view('class.exercises.show', compact(['user', 'exercise']));
    }
}
