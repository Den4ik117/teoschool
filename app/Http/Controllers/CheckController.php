<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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

        return response()->json([
            'correct' => $result
        ]);
    }
}
