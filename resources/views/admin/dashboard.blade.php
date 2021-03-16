@extends('layouts.dashboard')

@section('title', 'Главная • Панель администратора')

@section('navigation', 'Главная')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Добро пожаловать в панель администратора!</div>
    <p>Добро пожаловать в панель администратора сайта <a style="display: inline-block;" href="http://teoschool.ru">http://teoschool.ru</a>! Здесь вы сможете делать разные вещи: писать новости, шпаргалки, делать статьи; а кроме того удалять и редактировать их!</p>

    @can('create news')
      <div class="main__block-title">Новости</div>
      <a href="{{ route('admin-news') }}">Новости</a>
    @endcan

    @can('create cheats')
      <div class="main__block-title">Шпаргалки</div>
      <a href="{{ route('admin-cheats') }}">Шпаргалки</a>
    @endcan
    
    @can('create lessons')
      <div class="main__block-title">Курсы</div>
      @can('create courses')
        <a href="{{ route('admin-courses') }}">Список курсов</a>
      @endcan
      <a href="{{ route('write-lesson') }}">Создать урок</a>
      <a href="{{ route('admin-lessons') }}">Все уроки</a>
    @endcan

    @can('add roles')
      <div class="main__block-title">Управление ролями и разрешениями</div>
      <a href="{{ route('admin-roles') }}">Роли и разрешения</a>
    @endcan
  </div>
@endsection