<?php

namespace App\Http\Controllers\Class;

use App\Enums\ExerciseStatus;
use App\Enums\PersonGrade;
use App\Http\Controllers\Controller;
use App\Models\WorkingClass;
use Illuminate\Http\Request;

class WorkingClassController extends Controller
{
    public function show(Request $request, $uuid)
    {
        $wClass = WorkingClass::with(['persons' => fn ($query) => $query->orderByDesc('scores')])
            ->where('uuid', $uuid)
            ->firstOrFail();
        $user = $request->user()->with(['person'])->first();

        return view('class.classes.show', compact(['user', 'wClass']));
    }

    public function exerciseCreate(Request $request, $uuid)
    {
        $wClass = WorkingClass::where('uuid', $uuid)->firstOrFail();
        $user = $request->user()->with(['person'])->first();

        return view('class.exercises.create', compact(['wClass', 'user']));
    }

    public function exerciseStore(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'reward' => 'required|integer|min:0',
        ]);

        $wClass = WorkingClass::with(['persons'])->where('uuid', $uuid)->firstOrFail();

        foreach ($wClass->persons as $person) {
            if ($person->grade === PersonGrade::Student) {
                $person->exercises()->create([
                    'name' => $request->input('name'),
                    'content' => $request->input('content'),
                    'status' => ExerciseStatus::InWork,
                    'reward' => $request->input('reward'),
                ]);
            }
        }

        return to_route('class.classes.exercises.create', $wClass->uuid)->with('success', 'Вы успешно добавили домашнее задание!');
    }
}
