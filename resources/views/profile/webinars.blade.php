@extends('layouts.app')

@section('title', 'Вебинары')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Вебинары</span>
        </div>
        <a class="create-btn bg-green-500 text-white font-semibold py-1 px-2 hover:bg-green-600 rounded text-sm" href="{{ route('class.index') }}">
            <span class="block sm:hidden">＋</span>
            <span class="hidden sm:block">Перейти в класс</span>
        </a>
    </div>
@endsection

@section('content')
    <div class="mt-6">
{{--        <div class="md:grid md:grid-cols-3 md:gap-6">--}}
{{--            <div class="md:col-span-1">--}}
{{--                <div class="px-4 sm:px-0">--}}
{{--                    <h3 class="text-lg font-medium leading-6 text-gray-900">Доступные награды</h3>--}}
{{--                    <p class="mt-1 text-sm text-gray-600">Выполняя курсы и проходя задания, вы можете получать награды: фирменные футболки, кофты и многое другое.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="mt-5 md:mt-0 md:col-span-2 flex flex-col gap-4">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <p class="text-xl font-semibold">Список вебинаров</p>
                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <a class="block w-full rounded overflow-hidden hover:shadow-lg border" href="https://youtu.be/LtCCFZJEnng" target="_blank">
                                    <img class="w-full" src="{{ Vite::asset('resources/images/webinars/1.jpg') }}" alt="Фото с вебинара Денис Загвоздина по дискретной математике №1">
                                    <div class="flex flex-col gap-1 p-4">
                                        <div class="text-lg font-semibold">Вебинар №1</div>
                                        <div class="text-sm font-medium text-gray-600 text-justify">На трансляции разбираем 20 вариант из домашнего задания по дискретной математике.</div>
                                        <div class="mt-1">
                                            <span class="px-2 py-0.5 text-xs bg-sky-300 text-sky-800 rounded-full font-semibold">Дискретная математика</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="block w-full rounded overflow-hidden hover:shadow-lg border" href="https://youtu.be/jPlwfn7j41s" target="_blank">
                                    <img class="w-full" src="{{ Vite::asset('resources/images/webinars/2.jpg') }}" alt="Фото с вебинара Денис Загвоздина по дискретной математике №2">
                                    <div class="flex flex-col gap-1 p-4">
                                        <div class="text-lg font-semibold">Вебинар №2</div>
                                        <div class="text-sm font-medium text-gray-600 text-justify">На трансляции разбираем 16 вариант из домашнего задания по дискретной математике.</div>
                                        <div class="mt-1">
                                            <span class="px-2 py-0.5 text-xs bg-sky-300 text-sky-800 rounded-full font-semibold">Дискретная математика</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="block w-full rounded overflow-hidden hover:shadow-lg border" href="https://youtu.be/ZkigF5ncR-I" target="_blank">
                                    <img class="w-full" src="{{ Vite::asset('resources/images/webinars/3.jpg') }}" alt="Фото с вебинара Денис Загвоздина по дискретной математике №3">
                                    <div class="flex flex-col gap-1 p-4">
                                        <div class="text-lg font-semibold">Вебинар №3</div>
                                        <div class="text-sm font-medium text-gray-600 text-justify">На трансляции разбираем 3 вариант из домашнего задания по дискретной математике.</div>
                                        <div class="mt-1">
                                            <span class="px-2 py-0.5 text-xs bg-sky-300 text-sky-800 rounded-full font-semibold">Дискретная математика</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

{{--                        <iframe src="https://vk.com/video_ext.php?oid=670478215&id=456239721&hash=27dc89501299ce32" width="640" height="360" frameborder="0" allowfullscreen="1" allow="autoplay; encrypted-media; fullscreen; picture-in-picture"></iframe>--}}
{{--                        <p class="text-sm text-gray-700 mt-2 text-justify">{{ 'te' }}</p>--}}
{{--                        <p class="mt-2 font-semibold">{{ $i + 1 }} часть</p>--}}
{{--                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">--}}
{{--                            <div class="block p-2 border border-indigo-200 border-2 rounded bg-indigo-50 hover:bg-indigo-100 text-xs cursor-pointer">--}}
{{--                                <iframe src="https://vk.com/video_ext.php?oid=670478215&id=456239721&hash=27dc89501299ce32" width="640" height="360" frameborder="0" allowfullscreen="1" allow="autoplay; encrypted-media; fullscreen; picture-in-picture"></iframe>--}}
{{--                                <img src="https://i0.wp.com/tipoprint.ru/wp-content/uploads/2022/11/black_thistle_3.jpg?fit=770%2C1000&ssl=1" alt="">--}}
{{--                                <span class="block mt-3 mx-auto text-center font-bold text-blue-600">500 баллов</span>--}}
{{--                            </div>--}}
{{--                            <div class="block p-2 border border-indigo-200 border-2 rounded bg-indigo-50 hover:bg-indigo-100 text-xs cursor-pointer">--}}
{{--                                <img src="https://www.pinkbus.ru/im/600x600/1601060/157/5852943/paintsplash.jpg" alt="">--}}
{{--                                <span class="block mt-3 mx-auto text-center font-bold text-blue-600">250 баллов</span>--}}
{{--                            </div>--}}
{{--                            <div class="block p-2 border border-indigo-200 border-2 rounded bg-indigo-50 hover:bg-indigo-100 text-xs cursor-pointer">--}}
{{--                                <img src="https://img1.mnogo-futbolochek.ru/images/0/0/964/964939/previews/people_4_manshortfull_front_white_700.jpg" alt="">--}}
{{--                                <span class="block mt-3 mx-auto text-center font-bold text-blue-600">100 баллов</span>--}}
{{--                            </div>--}}
{{--                            <div class="block p-2 border border-indigo-200 border-2 rounded bg-indigo-50 hover:bg-indigo-100 text-xs cursor-pointer">--}}
{{--                                <img src="https://assets.vogue.ru/photos/6069cd7ff4c30d1a9c0f4c38/master/w_1600%2Cc_limit/IMG_7687.jpg" alt="">--}}
{{--                                <span class="block mt-3 mx-auto text-center font-bold text-blue-600">200 баллов</span>--}}
{{--                            </div>--}}
{{--                            <div class="block p-2 border border-indigo-200 border-2 rounded bg-indigo-50 hover:bg-indigo-100 text-xs cursor-pointer">--}}
{{--                                <img src="https://storage.vsemayki.ru/images/0/2/2145/2145079/previews/people_4_manshortfull_front_white_500.jpg" alt="">--}}
{{--                                <span class="block mt-3 mx-auto text-center font-bold text-blue-600">1000 баллов</span>--}}
{{--                            </div>--}}
{{--                            <div class="block p-2 border border-indigo-200 border-2 rounded bg-indigo-50 hover:bg-indigo-100 text-xs cursor-pointer">--}}
{{--                                <img src="https://ae04.alicdn.com/kf/S23d562c43e074d069f43d161b165c19dP/-.jpg_640x640.jpg" alt="">--}}
{{--                                <span class="block mt-3 mx-auto text-center font-bold text-blue-600">300 баллов</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a class="block text-center bg-emerald-400 hover:bg-emerald-500 mt-4 rounded py-2 text-white font-bold uppercase text-xs" href="{{ route('class.index') }}">Перейти в класс</a>--}}
                    </div>
                </div>
            </div>
{{--        </div>--}}
    </div>
@endsection
