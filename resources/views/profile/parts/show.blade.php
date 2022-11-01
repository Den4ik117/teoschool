@extends('layouts.app')

@section('title', $part->name)

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>{{ $module->task }}: {{ $module->description }} » {{ $part->name }}</span>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('profile.modules.show', [$course->slug, $module->id]) }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Назад к модулю</span>
        </a>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/profile/parts/index.ts')
@endsection

@section('content')
    <div class="mt-6">
        <div class="shadow bg-white rounded-lg overflow-hidden">
            <div class="bg-gray-50 p-4 border-b">
                <p class="text-lg font-medium flex justify-between items-center">
                    <span class="text-gray-600 text-sm uppercase">Курс</span>
                    <span>{{ $course->name }}</span>
                </p>
                <p class="text-lg font-medium flex justify-between items-center mt-2">
                    <span class="text-gray-600 text-sm uppercase">Модуль</span>
                    <span class="">{{ $module->task }}: {{ $module->description }}</span>
                </p>
                <p class="text-lg font-medium flex justify-between items-center mt-2">
                    <span class="text-gray-600 text-sm uppercase">Часть</span>
                    <span class="">{{ $part->name }}</span>
                </p>
            </div>

            <div class="p-4">
                <p class="text-center text-2xl font-medium mb-2">Содержание</p>
                {!! $part->content !!}
                <p class="text-center text-2xl font-medium my-2">Тесты</p>
                <div id="insert" data-tasks="{{ $part->tasks }}"></div>
            </div>
        </div>
    </div>
@endsection
