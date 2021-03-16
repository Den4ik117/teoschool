@extends('layouts.dashboard')

@section('title', 'Редактировать шпаргалку • Панель администратора')

@section('navigation', 'Редактировать шпаргалку')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Редактировать шпаргалку</div>
    <form class="form" action="{{ route('edit-cheat') }}" method="POST">
      @csrf
      <input type="hidden" name="cheat_id" value="{{ $cheat->id }}">
      <div class="input-text">
        <p>Название</p>
        <input type="text" name="name" placeholder="Название" value="{{ $cheat->name }}" required>
      </div>
      <div class="input-text">
        <p>Школьный предмет</p>
        <input type="text" name="subject" placeholder="Школьный предмет" value="{{ $cheat->subject }}" required>
      </div>
      <div class="input-text">
        <p>Ссылка на шпаргалку</p>
        <input type="text" name="url" placeholder="Ссылка на шпаргалку" value="{{ $cheat->url }}" required>
      </div>
      <button class="btn" type="submit">Сохранить</button>
    </form>
  </div>
@endsection