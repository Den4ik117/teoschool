
@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>{{ __('messages.dashboard.modules.title') }}</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard') }}">[назад]</a>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('dashboard.modules.create') }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Создать</span>
        </a>
    </div>
@endsection

@section('content')
    @if($modules->isNotEmpty())
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">
                                        Информация
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-500 uppercase whitespace-nowrap">
                                        Курс
                                    </th>
                                    <th scope="col" class="p-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($modules as $module)
                                    <tr class="bg-white border-t hover:bg-gray-50">
                                        <td class="max-w-md">
                                            <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('dashboard.modules.edit', $module->id) }}">
                                                <div class="flex items-center gap-2">
                                                    <div @class([
                                                            'flex items-center justify-center w-0.5 rounded h-10 bg-blue-300',
                                                            'bg-violet-300' => $module->course->id === 1,
                                                            'bg-lime-300' => $module->course->id === 2,
                                                            'bg-fuchsia-300' => $module->course->id === 3,
                                                            'bg-orange-300' => $module->course->id === 4,
                                                            'bg-red-300' => $module->course->id === 5
                                                        ])></div>
                                                    <div>
                                                        <span class="block font-semibold">
                                                            {{ $module->task }}
                                                        </span>
                                                        <span class="block text-gray-600">
                                                            {{ $module->description }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="block py-4 px-6 text-center" href="{{ route('dashboard.modules.edit', $module->id) }}">
                                                <span @class([
                                                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800',
                                                    'bg-violet-100 text-violet-800' => $module->course->id === 1,
                                                    'bg-lime-100 text-lime-800' => $module->course->id === 2,
                                                    'bg-fuchsia-100 text-fuchsia-800' => $module->course->id === 3,
                                                    'bg-orange-100 text-orange-800' => $module->course->id === 4,
                                                    'bg-red-100 text-red-800' => $module->course->id === 5
                                                ])>
                                                    {{ $module->course->name }}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="block py-4 px-6 text-right" href="{{ route('dashboard.modules.edit', $module->id) }}">
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
