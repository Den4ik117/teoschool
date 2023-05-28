<?php

namespace App\Http\Controllers\Class;

use App\Enums\ExerciseStatus;
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

    public function complete(Request $request, Exercise $exercise)
    {
        abort_if($request->user()->person->id !== $exercise->person_id, 403);

        $exercise->update([
            'status' => ExerciseStatus::Completed,
        ]);

        $request->user()->person->increment('scores', $exercise->reward);

        return to_route('class.exercises.show', $exercise->uuid)->with('success', 'Вы успешно выполнили задание!');
    }
}
