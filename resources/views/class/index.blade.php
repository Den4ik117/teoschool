@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Учебный класс</span>
        </div>
        <small>[{{ $user->person->grade->label() }}]</small>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="mb-5 text-sm font-bold uppercase">Ваши задачи</div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach ($user->person->exercises as $task)
                        <a class="bg-gray-300 rounded flex flex-col px-6 py-4" href="{{ route('class.exercises.show', $task->uuid) }}">
                            <span class="font-bold text-gray-700">
                                {{ $task->name }}
                                @if($task->status === \App\Enums\ExerciseStatus::Completed)
                                    <small class="text-green-600 font-bold">[{{ $task->status->label() }}]</small>
                                @endif
                            </span>
                            <span class="font-bold text-gray-600 text-sm">{{ $task->content }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($user->person->classes as $wClass)
                        <a class="bg-blue-300 rounded flex items-center justify-center p-6" href="{{ route('class.classes.show', $wClass->uuid) }}">
                            <span class="font-bold text-blue-700 text-2xl">{{ $wClass->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
