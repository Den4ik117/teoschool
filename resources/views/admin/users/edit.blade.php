@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Изменение пользователя</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('admin.users.index') }}">[назад]</a>
        </div>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="create-btn bg-red-500 text-white font-semibold py-1 px-2 hover:bg-red-600 rounded text-sm" type="submit" onclick="return confirm('Вы уверены, что хотите удалить пользователя?');">
                <span class="block sm:hidden">—</span>
                <span class="hidden sm:block">Удалить</span>
            </button>
        </form>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Изменение пользователя</h3>
                    <p class="mt-1 text-sm text-gray-600">Здесь вы можете изменить имя, фамилию и роль у пользователя.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700" for="first_name">Имя:</label>
                                    <input id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" placeholder="Иван" name="first_name" autocomplete="off" value="{{ old('first_name', $user->first_name) }}" autofocus required>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700" for="last_name">Фамилия:</label>
                                    <input id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" placeholder="Иванов" name="last_name" autocomplete="off" value="{{ old('last_name', $user->last_name) }}" required>
                                </div>

                                <div class="col-span-6 space-y-2">
                                    @foreach($roles as $index => $role)
                                        <div class="flex items-center">
                                            <input id="role-{{ $index }}" name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="{{ $role }}" @checked(old('role', $user->role) === $role)>
                                            <label for="role-{{ $index }}" class="ml-2 block text-sm font-medium text-gray-700 capitalize">{{ $role }}</label>
                                        </div>
                                    @endforeach
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
