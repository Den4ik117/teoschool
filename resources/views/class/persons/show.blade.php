@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Профиль {{ $user->person->grade->who() }} {{ $user->full_name }}</span>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('class.persons.exercises.create', $user->slug) }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Дать задание</span>
        </a>
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
                                <input id="role" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="role" autocomplete="off" value="{{ $user->person->grade->label() }}" disabled>
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

                            <div class="col-span-6 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700" for="slug">Рейтинг:</label>
                                <input id="slug" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="url" name="slug" autocomplete="off" value="{{ $user->person->scores }}" readonly>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700" for="slug">Класс:</label>
                                <input id="slug" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="url" name="slug" autocomplete="off" value="{{ $user->person->classes->map(fn ($class) => $class->name)->implode(', ') }}" readonly>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between gap-2 mt-6">
        <div class="text-lg font-semibold">Активные и выполненные задания ученика</div>
{{--        <a class="bg-green-500 hover:bg-green-600 text-sm rounded text-white px-3 py-1 font-bold" href="{{ route('class.classes.exercises.create', $wClass->uuid) }}">Домашнее задание</a>--}}
    </div>

    @if ($user->person->exercises->isNotEmpty())
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">
                                    Название
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">
                                    Содержание
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-500 uppercase whitespace-nowrap">
                                    Добавлено
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-500 uppercase whitespace-nowrap">
                                    Статус
                                </th>
                                <th scope="col" class="p-4"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->person->exercises as $exercise)
                                <tr class="bg-white border-t hover:bg-gray-50">
                                    <td class="max-w-md">
                                        <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('class.exercises.show', $exercise->uuid) }}">
                                            {{ $exercise->name }}
                                        </a>
                                    </td>
                                    <td class="text-left">
                                        <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('class.exercises.show', $exercise->uuid) }}">
                                            {{ $exercise->content }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('class.exercises.show', $exercise->uuid) }}">
                                            {{ $exercise->created_at->format('d.m.Y H:i') }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('class.exercises.show', $exercise->uuid) }}">
                                            {{ $exercise->status->label() }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="block py-4 px-6 text-right" href="{{ route('class.exercises.show', $exercise->uuid) }}">
                                            <span class="text-gray-500">»</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
