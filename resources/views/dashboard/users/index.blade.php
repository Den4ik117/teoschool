@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Пользователи и роли</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard') }}">[назад]</a>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('dashboard.users.create') }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Создать</span>
        </a>
    </div>
@endsection

@section('content')
    @if($users->isNotEmpty())
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Пользователь
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                        Роль
                                    </th>
                                    <th scope="col" class="p-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="bg-white border-t hover:bg-gray-50">
                                        <td>
                                            <a class="block py-4 px-6 text-sm text-gray-900 whitespace-nowrap" href="{{ route('dashboard.users.edit', $user->id) }}">
                                                <div class="flex items-center gap-2">
                                                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-r from-indigo-300 to-purple-400">
                                                    <span class="text-white font-bold select-none">
                                                        {{ $user->initials }}
                                                    </span>
                                                    </div>
                                                    <div>
                                                    <span class="block font-semibold">
                                                        {{ $user->full_name }}
                                                    </span>
                                                        <span class="block text-gray-600">
                                                        {{ $user->email }}
                                                    </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="block py-4 px-6 text-sm text-gray-900 whitespace-nowrap text-center" href="{{ route('dashboard.users.edit', $user->id) }}">
                                                <span @class([
                                                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                    'bg-blue-100 text-blue-800' => $user->isStudent(),
                                                    'bg-violet-100 text-violet-800' => $user->isNewsWriter(),
                                                    'bg-lime-100 text-lime-800' => $user->isCheatSheetWriter(),
                                                    'bg-fuchsia-100 text-fuchsia-800' => $user->isCourseCreator(),
                                                    'bg-orange-100 text-orange-800' => $user->isAdministrator(),
                                                    'bg-red-100 text-red-800' => $user->isDeveloper()
                                                ])>
                                                    {{ $user->role->description() }}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="block py-4 px-6 text-right" href="{{ route('dashboard.users.edit', $user->id) }}">
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
