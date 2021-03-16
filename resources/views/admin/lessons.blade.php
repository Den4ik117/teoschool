@extends('layouts.dashboard')

@section('title', 'Все уроки • Панель администратора')

@section('navigation', 'Все уроки')

@section('main')
  <table class="table">
    <thead>
      <tr>
        <td>ID</td>
        <td>Название курса</td>
        <td>Заголовок урока</td>
        <td>Подзаголовок урока</td>
        <td>Изображение</td>
        <td>Опубликован</td>
        <td>Редактировать</td>
        <td>Удалить</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($lessons as $lesson)
        <tr>
          <td>{{ $lesson->id }}</td>
          <td>{{ $lesson->course->name }}</td>
          <td>{{ $lesson->title }}</td>
          <td>{{ $lesson->subtitle }}</td>
          <td>
            @if ($lesson->image_url)
              <a href="{{ $lesson->image_url }}">[ссылка]</a>
            @else
              —
            @endif
          </td>
          <td>
            @if ($lesson->publish)
              <input type="checkbox" checked disabled>
            @else
              <input type="checkbox" disabled>
            @endif
          </td>
          <td><a href="{{ route('admin-one-lesson', ['lesson_id' => $lesson->id]) }}">[редактировать]</a></td>
          <td>
            <form method="POST" action="{{ route('delete-lesson') }}">
              @csrf
              <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
              <button class="btn">Удалить урок</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection