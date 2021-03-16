@extends('layouts.dashboard')

@section('title', 'Курсы • Панель администратора')

@section('navigation', 'Курсы')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Создать курс</div>
    <form class="form" action="{{ route('create-course') }}" method="POST">
      @csrf
      <div class="input-text">
        <p>Название курса (предмет)</p>
        <input type="text" name="name" placeholder="Название курса (предмет)" required>
      </div>
      <div class="input-text">
        <p>Ссылка на страницу курса</p>
        <input type="text" name="course_url" placeholder="Ссылка на страницу курса" required>
      </div>
      <div class="input-text">
        <p>URL для курса</p>
        <input type="text" name="url" placeholder="URL для курса" required>
      </div>
      <button class="btn" type="submit">Создать курс</button>
    </form>
  </div>

  <table class="table">
    <thead>
      <tr>
        <td>ID</td>
        <td>Название курса</td>
        <td>Ссылка на страницу курса</td>
        <td>Изменить курс</td>
        <td>Удалить курс</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($courses as $course)
        <tr>
          <td>{{ $course->id }}</td>
          <td>{{ $course->name }}</td>
          <td><a href="{{ $course->course_url }}">{{ $course->course_url }}</a></td>
          <td><a href="{{ route('admin-course', ['course_id' => $course->id]) }}">[Изменить]</a></td>
          <td>
            <form method="POST" action="{{ route('delete-course') }}">
              @csrf
              <input type="hidden" name="course_id" value="{{ $course->id }}">
              <button class="btn">Удалить курс</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection