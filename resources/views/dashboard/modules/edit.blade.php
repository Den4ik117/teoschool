@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>{{ __('messages.dashboard.modules.update.title') }}</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard.modules.index') }}">[назад]</a>
        </div>
        <form action="{{ route('dashboard.modules.destroy', $module->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="create-btn bg-red-500 text-white font-semibold py-1 px-2 hover:bg-red-600 rounded text-sm" type="submit" onclick="return confirm('{{ __('messages.dashboard.modules.sure') }}');">
                <span class="block sm:hidden">—</span>
                <span class="hidden sm:block">Удалить</span>
            </button>
        </form>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/dashboard/modules/index.js')
@endsection

@section('content')
    <div class="mt-6">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid sm:grid-cols-2 gap-4 text-center">
                    <a class="block bg-teal-500 text-white font-semibold py-1 px-2 hover:bg-teal-600 rounded text-sm col-span-2" href="{{ route('dashboard.modules.parts.index', $module->id) }}">
                        {{ __('messages.dashboard.modules.parts.title') }}
                    </a>

                    @foreach($parts as $part)
                        <a class="block bg-gray-400 text-white font-semibold py-1 px-2 hover:bg-gray-500 rounded text-sm" href="{{ route('dashboard.parts.edit', $part->id) }}">
                            {{ $part->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('messages.dashboard.modules.update.title') }}</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ __('messages.dashboard.modules.update.subtitle') }}</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('dashboard.modules.update', $module->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div id="insert" class="grid grid-cols-6 gap-6" data-course="{{ old('course_id', $module->course_id) }}" data-part="{{ old('part', $module->part) }}" data-task="{{ old('task', $module->task) }}" data-description="{{ old('task', $module->task) }}"></div>
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
