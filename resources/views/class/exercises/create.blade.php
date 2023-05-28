@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Создание задания</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('class.classes.show', $wClass->uuid) }}">[назад]</a>
        </div>
        <small>[{{ $user->person->grade->label() }}]</small>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Создание домашнего задания</h3>
                    <p class="mt-1 text-sm text-gray-600">Здесь вы можете создать домашнее задание для всего класса</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('class.classes.exercises.store', $wClass->uuid) }}" method="POST">
                    @csrf

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="name">Название задания:</label>
                                    <input id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="" type="text" name="name" autocomplete="off" value="{{ old('name', '') }}" autofocus required>
                                </div>

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="name">Содержание:</label>
                                    <textarea rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="" type="text" name="content" autocomplete="off" required>{{ old('content') }}</textarea>
                                </div>

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="name">Награда:</label>
                                    <input id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="" type="number" name="reward" autocomplete="off" value="{{ old('reward', '') }}" required>
                                </div>


                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
