@extends('layouts.app')

@section('title', 'Курсы')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Все курсы</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('profile', auth()->user()->slug) }}">[назад]</a>
        </div>
{{--        @if ($user->id === auth()->user()->id)--}}
{{--            <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="#">--}}
{{--                <span class="block sm:hidden">＋</span>--}}
{{--                <span class="hidden sm:block">Записаться на курс</span>--}}
{{--            </a>--}}
{{--        @endif--}}
    </div>
@endsection

@section('content')
    @foreach($courses as $course)
        <div class="mt-6">
            <div class="bg-white rounded-lg overflow-hidden shadow">
                <div class="p-4">
                    <div class="flex gap-4">
                        <div
                            @class([
                                'flex-none w-24 h-24 rounded-full flex items-center justify-center bg-gradient-to-r',
                                'from-violet-300 to-violet-400 text-violet-800' => $course->id === 1,
                                'from-lime-300 to-lime-400 text-lime-800' => $course->id === 2,
                                'from-fuchsia-300 to-fuchsia-400 text-fuchsia-800' => $course->id === 3,
                                'from-orange-300 to-orange-400 text-orange-800' => $course->id === 4,
                                'from-red-300 to-red-400 text-red-800' => $course->id === 5
                            ])
                        >
                            <span class="uppercase font-bold text-lg">
                                {{ mb_substr($course->name, 0, 3) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm text-gray-700">Курс по предмету</p>
                            <p class="text-2xl font-semibold mt-1">{{ $course->name }}</p>
                            <p class="text-sm text-gray-700 mt-2">{{ $course->description }}</p>
                            @if ($course->users->contains(auth()->user()->id))
                                <p class="text-sm text-gray-700 mt-2 text-red-600">Вы уже записаны на этот курс!</p>
                            @endif
                        </div>
                    </div>
                </div>
                @unless ($course->users->contains(auth()->user()->id))
                    <form action="{{ route('profile.courses.store', $course->id) }}" method="POST">
                        @csrf
                        <button class="block w-full text-center py-4 bg-gray-50 border-t text-gray-700 text-xs uppercase font-semibold hover:bg-gray-100" type="submit">Приобрести доступ за {{ $course->fee }} руб</button>
                    </form>
                @endunless
            </div>
        </div>
    @endforeach
@endsection
