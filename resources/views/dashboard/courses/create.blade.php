@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Добавление курса</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard.courses.index') }}">[назад]</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Добавление курса</h3>
                    <p class="mt-1 text-sm text-gray-600">Здесь вы можете создать новый курс.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('dashboard.courses.store') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="name">Название:</label>
                                    <input id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Физика" type="text" name="name" autocomplete="off" value="{{ old('name') }}" autofocus required>
                                </div>

                                <div class="col-span-6 space-y-2">
                                    @foreach($parts as $part)
                                        <div class="flex items-center">
                                            <input id="part-{{ $part }}" name="parts" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="{{ $part }}" @checked(old('parts', \App\Enums\Part::TwoParts->value) == $part->value)>
                                            <label for="part-{{ $part }}" class="ml-2 block text-sm font-medium text-gray-700">{{ $part->value }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="description">Описание (лид):</label>
                                    <textarea id="description" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="description" autocomplete="off" required>{{ old('description') }}</textarea>
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
