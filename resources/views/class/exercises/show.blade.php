@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Задание «{{ $exercise->name }}»</span>
        </div>
        <small>[{{ $user->person->grade->label() }}]</small>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="flex flex-col gap-4">
                    <span>{{ $exercise->name }}</span>
                    <span>{{ $exercise->content }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
