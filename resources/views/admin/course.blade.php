@extends('layouts.dashboard')

@section('title', 'Редактировать курс • Панель администратора')

@section('navigation', 'Редактировать курс')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Редактировать курс</div>
    <form class="form" action="{{ route('edit-course') }}" method="POST">
      @csrf
      <input type="hidden" name="course_id" value="{{ $course->id }}">
      <div class="input-text">
        <p>Название курса (предмет)</p>
        <input type="text" name="name" placeholder="Название курса (предмет)" value="{{ $course->name }}" required>
      </div>
      <div class="input-text">
        <p>Ссылка на страницу курса</p>
        <input type="text" name="course_url" placeholder="Ссылка на страницу курса" value="{{ $course->course_url }}" required>
      </div>
      <button class="btn" type="submit">Сохранить</button>
    </form>
  </div>
@endsection