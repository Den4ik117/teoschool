@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Курсы</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard') }}">[назад]</a>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('dashboard.courses.create') }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Создать</span>
        </a>
    </div>
@endsection

@section('content')
    @if($courses->isNotEmpty())
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">
                                        Название предмета
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">
                                        Описание
                                    </th>
                                    <th scope="col" class="p-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                    <tr class="bg-white border-t hover:bg-gray-50">
                                        <td>
                                            <a class="block py-4 px-6 text-sm text-gray-900 whitespace-nowrap" href="{{ route('dashboard.courses.edit', $course->id) }}">
                                                {{ $course->name }}
                                            </a>
                                        </td>
                                        <td class="max-w-md">
                                            <a class="block py-4 px-6 truncate text-sm text-gray-900 text-left" href="{{ route('dashboard.courses.edit', $course->id) }}">
                                                <small>{{ $course->description }}</small>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="block py-4 px-6 text-right" href="{{ route('dashboard.courses.edit', $course->id) }}">
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
