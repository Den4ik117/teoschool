@extends('layouts.app')

@section('title', $user->full_name)

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Профиль пользователя {{ $user->full_name }}</span>
        </div>
        @if ($user->id === auth()->user()->id)
            <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('profile.courses.index') }}">
                <span class="block sm:hidden">＋</span>
                <span class="hidden sm:block">Записаться на курс</span>
            </a>
        @endif
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Данные пользователя</h3>
                    <p class="mt-1 text-sm text-gray-600">Основные данные профиля пользователя {{ $user->full_name }}.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-8 gap-y-6 gap-x-4">

                            <div class="col-span-6 sm:col-span-4">
                                <label class="block text-sm font-medium text-gray-700" for="first_name">Имя:</label>
                                <input id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="first_name" autocomplete="off" value="{{ $user->first_name }}" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="block text-sm font-medium text-gray-700" for="last_name">Фамилия:</label>
                                <input id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="last_name" autocomplete="off" value="{{ $user->last_name }}" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label class="block text-sm font-medium text-gray-700" for="email">Почта пользователя:</label>
                                <input id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="email" name="email" autocomplete="off" value="{{ $user->email }}" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700" for="role">Роль:</label>
                                <input id="role" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="role" autocomplete="off" value="{{ $user->role->description() }}" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700" for="scores">Собрано очков:</label>
                                <input id="scores" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="scores" autocomplete="off" value="{{ $user->scores }}" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700" for="wallet">Денег на аккаунте:</label>
                                <input id="wallet" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="wallet" autocomplete="off" value="{{ $user->wallet }}" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="block text-sm font-medium text-gray-700" for="slug">Ссылка на профиль:</label>
                                <input id="slug" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="url" name="slug" autocomplete="off" value="{{ route('profile', $user->slug) }}" readonly>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($user->courses->isNotEmpty())
        <div class="mt-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Доступные курсы</h3>
                        <p class="mt-1 text-sm text-gray-600">Все курсы, на которые вы записаны и можете начать прохождение.</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2 flex flex-col gap-4">
                    @foreach($user->courses as $course)
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <p class="text-xl font-semibold">{{ $course->name }}</p>
                                <p class="text-sm text-gray-700 mt-2 text-justify">{{ $course->description }}</p>
                                @for ($i = 0; $i < $course->parts->value; $i++)
                                    <p class="mt-2 font-semibold">{{ $i + 1 }} часть</p>
                                    <div class="grid grid-cols-3 gap-4 mt-2">
                                        @foreach ($course->modules as $module)
                                            @if ($module->part === $i + 1)
                                                <a class="block p-2 border border-indigo-200 border-2 rounded bg-indigo-50 hover:bg-indigo-100 text-xs" href="{{ route('profile.modules.show', [$course->slug, $module->id]) }}" title="Перейти к материалам модуля">{!! $module->title !!}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endfor
                                <a class="block text-center bg-emerald-400 hover:bg-emerald-500 mt-4 rounded py-2 text-white font-bold uppercase text-xs" href="{{ route('profile.courses.show', $course->slug) }}">Перейти к курсу</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
