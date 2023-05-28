@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Учебный класс {{ $wClass->name }}</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('class.index') }}">[назад]</a>
        </div>
        <small>[{{ $user->person->grade->label() }}]</small>
    </div>
@endsection

@section('content')
{{--    <div class="mt-6">--}}
{{--        <div class="shadow overflow-hidden sm:rounded-md">--}}
{{--            <div class="px-4 py-5 bg-white sm:p-6">--}}
{{--                <div class="grid grid-cols-4 gap-4">--}}
{{--                    @foreach ($wClass->persons as $person)--}}
{{--                        <a class="bg-green-300 rounded flex flex-col items-center justify-center p-6" href="{{ route('profile', $person->user->slug) }}">--}}
{{--                            <span class="font-bold text-green-700 text-sm">--}}
{{--                                {{ $person->user->full_name }}--}}
{{--                                @if($person->user_id === auth()->id())--}}
{{--                                    (Вы)--}}
{{--                                @endif--}}
{{--                            </span>--}}
{{--                            <small class="text-green-800 font-semibold">[{{ $person->grade->label() }}]</small>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="flex items-center justify-between gap-2 mt-6">
        <div class="text-lg font-bold">Список класса их их рейтинг</div>
        <a class="bg-green-500 hover:bg-green-600 text-sm rounded text-white px-3 py-1 font-bold" href="{{ route('class.classes.exercises.create', $wClass->uuid) }}">Домашнее задание</a>
    </div>

    @if ($wClass->persons->isNotEmpty())
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">
                                    Имя и фамилия
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-500 uppercase whitespace-nowrap">
                                    Роль
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-500 uppercase whitespace-nowrap">
                                    Рейтинг
                                </th>
                                <th scope="col" class="p-4"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wClass->persons as $person)
                                <tr class="bg-white border-t hover:bg-gray-50">
                                    <td class="max-w-md">
                                        <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('class.persons.show', $person->user->slug) }}">
                                            {{ $person->user->full_name }}
                                            @if ($person->user_id === auth()->id())
                                                (Вы)
                                            @endif
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('class.persons.show', $person->user->slug) }}">
                                            <small>{{ $person->grade->label() }}</small>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('class.persons.show', $person->user->slug) }}">
{{--                                            <span class="bg-emerald-400 rounded-full px-5 py-1 font-bold text-white">{{ $person->scores }}</span>--}}
                                            {{ $person->scores }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="block py-4 px-6 text-right" href="{{ route('class.persons.show', $person->user->slug) }}">
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
