@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Приборная панель</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <form action="#" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid sm:grid-cols-2 gap-4 text-center">

                        @can('viewAny', \App\Models\User::class)
                            <a class="block bg-teal-500 text-white font-semibold py-1 px-2 hover:bg-teal-600 rounded text-sm col-span-2" href="{{ route('dashboard.users.index') }}">
                                Пользователи и роли
                            </a>
                        @endcan

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
