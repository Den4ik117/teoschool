@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Задание «{{ $exercise->name }}»</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('class.index') }}">[назад]</a>
        </div>
        <small>[{{ $user->person->grade->label() }}]</small>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col">
                        <span class="text-gray-500 text-sm">Задача:</span>
                        <span>{{ $exercise->name }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-500 text-sm">Подробности:</span>
                        <span>{{ $exercise->content }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-500 text-sm">Статус:</span>
                        <span>{{ $exercise->status->label() }}</span>
                    </div>
                    @if($exercise->status !== \App\Enums\ExerciseStatus::Completed)
                        <div class="flex items-center justify-end gap-4">
                            <form action="{{ route('class.exercises.complete', $exercise->uuid) }}" method="POST">
                                @csrf
                                <button class="bg-blue-500 hover:bg-blue-600 rounded px-3 py-1 font-bold text-white" type="submit">Выполнено</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
