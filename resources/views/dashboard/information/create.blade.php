@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between py-2">
        <div class="font-bold">
            <span>Добавление новости</span>
            <a class="text-indigo-400 font-bold hover:underline" href="{{ route('dashboard.information.index') }}">[назад]</a>
        </div>
    </div>
@endsection

@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
    <script>
        const froala = new FroalaEditor('#content');
    </script>
@endsection

@section('content')
    <div class="mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Добавление новости</h3>
                    <p class="mt-1 text-sm text-gray-600">Здесь вы можете создать новую новость.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('dashboard.information.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="title">Заголовок новости:</label>
                                    <input id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="title" autocomplete="off" value="{{ old('title') }}" autofocus required>
                                </div>

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="image">Изображение на обложке:</label>
                                    <input id="image" class="mt-1 block w-full sm:text-sm" type="file" name="image" required>
                                </div>

                                <div class="col-span-6">
                                    <textarea id="content" name="content">{{ old('content') }}</textarea>
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
