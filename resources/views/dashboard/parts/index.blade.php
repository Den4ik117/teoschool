
@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>{{ __('messages.dashboard.modules.parts.title') }}</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard.modules.edit', $module->id) }}">[назад]</a>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('dashboard.modules.parts.create', $module->id) }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Создать</span>
        </a>
    </div>
@endsection

@section('content')
    @if($parts->isNotEmpty())
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
{{--                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-500 uppercase whitespace-nowrap">--}}
{{--                                        Курс--}}
{{--                                    </th>--}}
                                    <th scope="col" class="p-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parts as $part)
                                    <tr class="bg-white border-t hover:bg-gray-50">
                                        <td class="max-w-md">
                                            <a class="block py-4 px-6 text-sm text-gray-900 truncate" href="{{ route('dashboard.parts.edit', $part->id) }}">
                                                {{ $part->name }}
                                            </a>
                                        </td>
{{--                                        <td>--}}
{{--                                            <a class="block py-4 px-6 text-center" href="{{ route('dashboard.parts.edit', $part->id) }}">--}}
{{--                                                <span @class([--}}
{{--                                                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800',--}}
{{--//                                                    'bg-violet-100 text-violet-800' => $part->course->id === 1,--}}
{{--//                                                    'bg-lime-100 text-lime-800' => $part->course->id === 2,--}}
{{--//                                                    'bg-fuchsia-100 text-fuchsia-800' => $part->course->id === 3,--}}
{{--//                                                    'bg-orange-100 text-orange-800' => $part->course->id === 4,--}}
{{--//                                                    'bg-red-100 text-red-800' => $part->course->id === 5--}}
{{--                                                ])>--}}
{{--                                                    {{ $part->course->name }}--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
                                        <td>
                                            <a class="block py-4 px-6 text-right" href="{{ route('dashboard.parts.edit', $part->id) }}">
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
