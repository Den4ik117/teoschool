@extends('layouts.app')

@section('title', $user->full_name)

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Профиль пользователя {{ $user->full_name }}</span>
        </div>
        @if ($user->id === auth()->user()->id)
            <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="#">
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
{{--                <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
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

{{--                                <div class="col-span-6 space-y-2">--}}
{{--                                    @foreach($roles as $role)--}}
{{--                                        <div class="flex items-center">--}}
{{--                                            <input id="role-{{ $role }}" name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="{{ $role }}" @checked(old('role', $user->role->value) == $role->value)>--}}
{{--                                            <label for="role-{{ $role }}" class="ml-2 block text-sm font-medium text-gray-700">{{ $role->description() }}</label>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}

                            </div>
                        </div>
{{--                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">--}}
{{--                            <button type="submit" class="inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Сохранить</button>--}}
{{--                        </div>--}}
                    </div>
{{--                </form>--}}
            </div>
        </div>
    </div>
@endsection
