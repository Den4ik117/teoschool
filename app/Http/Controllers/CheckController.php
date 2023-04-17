<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'task_id' => 'required|integer|exists:tasks,id',
            'answer' => 'required'
        ]);

        $task = Task::find($request->task_id);

//        dd($request->answer);

        $answers = [];
        $correct = json_decode($task->correct);
        foreach ($correct as $crt) {
            $answers[] = $crt;
        }

//        dd($answers);

        $rightAnswers = [];
        $options = json_decode($task->options);
        foreach ($options as $option) {
            if (in_array($option->id, $answers)) {
                $rightAnswers[] = $option->text;
            }
        }
        $rightAnswers = collect($rightAnswers);

//        return gettype($request->answer);

        $aws = $request->answer;
        $result = $rightAnswers->every(function ($value) use ($aws) {
            return in_array($value, $aws);
        }) && count($aws) === count($rightAnswers);

        if ($task->type === '3') {
            $result = $answers[0] === $aws[0];
        }

        if ($result && !$task->users()->find($request->user_id)) {
            $task->users()->attach($request->user_id);
            User::find($request->user_id)->increment('scores', $task->scores);
        }

        return response()->json([
            'correct' => $result
        ]);
    }
}
