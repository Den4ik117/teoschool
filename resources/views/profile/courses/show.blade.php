@extends('layouts.app')

@section('title', $course->name)

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Курс «{{ $course->name }}»</span>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('profile.courses.index') }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Все курсы</span>
        </a>
    </div>
@endsection

@section('content')
    <div class="mt-6">
        <div class="flex flex-col gap-4">
            @foreach ($course->modules as $module)
                @include('profile.modules.component')
            @endforeach
        </div>
    </div>
@endsection
