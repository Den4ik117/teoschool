<?php

namespace App\Http\Controllers\Class;

use App\Enums\ExerciseStatus;
use App\Enums\PersonGrade;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkingClass;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show(User $user)
    {
        $user->load(['person', 'person.classes', 'person.exercises' => fn ($query) => $query->latest()]);

        return view('class.persons.show', compact(['user']));
    }

    public function exerciseCreate(User $user)
    {
        $user->load(['person']);

        return view('class.persons.exercises.create', compact(['user']));
    }

    public function exerciseStore(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'reward' => 'required|integer|min:0',
        ]);

        $user->load(['person']);

        $user->person->exercises()->create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'status' => ExerciseStatus::InWork,
            'reward' => $request->input('reward'),
        ]);

        return to_route('class.persons.exercises.create', $user->slug)->with('success', 'Вы успешно добавили задание ' . $user->person->grade->who() . '!');
    }
}
