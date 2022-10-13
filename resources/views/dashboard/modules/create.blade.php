@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>{{ __('messages.dashboard.modules.create.title') }}</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard.modules.index') }}">[назад]</a>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/dashboard/modules/index.js')
@endsection

@section('content')
    <div class="mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('messages.dashboard.modules.create.title') }}</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ __('messages.dashboard.modules.create.subtitle') }}</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('dashboard.modules.store') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div id="insert" class="grid grid-cols-6 gap-6" data-course="{{ old('course_id', '') }}" data-part="{{ old('part', 1) }}" data-task="{{ old('task', '') }}" data-description="{{ old('task', '') }}"></div>
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
