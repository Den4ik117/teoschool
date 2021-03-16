@extends('layouts.dashboard')

@section('title', 'Шпаргалки • Панель администратора')

@section('navigation', 'Шпаргалки')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Создать шпаргалку</div>
    <form class="form" action="{{ route('create-cheat') }}" method="POST">
      @csrf
      <div class="input-text">
        <p>Название</p>
        <input type="text" name="name" placeholder="Название" required>
      </div>
      <div class="input-text">
        <p>Школьный предмет</p>
        <input type="text" name="subject" placeholder="Школьный предмет" required>
      </div>
      <div class="input-text">
        <p>Ссылка на шпаргалку</p>
        <input type="text" name="url" placeholder="Ссылка на шпаргалку" required>
      </div>
      <button class="btn" type="submit">Создать шпаргалку</button>
    </form>
  </div>

  <table class="table">
    <thead>
      <tr>
        <td>ID</td>
        <td>Название</td>
        <td>Предмет</td>
        <td>Ссылка</td>
        <td>Изменить</td>
        <td>Удалить</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($cheats as $cheat)
        <tr>
          <td>{{ $cheat->id }}</td>
          <td>{{ $cheat->name }}</td>
          <td>{{ $cheat->subject }}</td>
          <td><a href="{{ $cheat->url }}">[ссылка]</a></td>
          <td><a href="{{ route('admin-cheat', ['cheat_id' => $cheat->id]) }}">[изменить]</a></td>
          <td>
            <form method="POST" action="{{ route('delete-cheat') }}">
              @csrf
              <input type="hidden" name="cheat_id" value="{{ $cheat->id }}">
              <button class="btn">Удалить шпаргалку</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection