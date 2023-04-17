@extends('layouts.app')

@section('title', 'Приборная панель')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Учебный класс {{ $wClass->name }}</span>
        </div>
        <small>[{{ $user->person->grade->label() }}]</small>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($wClass->persons as $person)
                        <a class="bg-green-300 rounded flex flex-col items-center justify-center p-6" href="{{ route('profile', $person->user->slug) }}">
                            <span class="font-bold text-green-700 text-sm">{{ $person->user->full_name }}</span>
                            <small class="text-green-800 font-semibold">[{{ $person->grade->label() }}]</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
