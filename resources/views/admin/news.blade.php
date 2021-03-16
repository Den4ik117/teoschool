@extends('layouts.dashboard')

@section('title', 'Новости • Панель администратора')

@section('navigation', 'Новости')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Создать новость</div>
    <form class="form" action="{{ route('create-new') }}" method="POST">
      @csrf
      <div class="input-text">
        <p>Заголовок</p>
        <input type="text" name="title" placeholder="Заголовок" required>
      </div>
      <div class="input-text">
        <p>Содержание новости</p>
        <input type="text" name="content" placeholder="Содержание новости" required>
      </div>
      <div class="input-text">
        <p>URL картинки новости</p>
        <input type="text" name="image_url" placeholder="URL картинки новости" required>
      </div>
      <button class="btn" type="submit">Создать новость</button>
    </form>
  </div>

  <table class="table">
    <thead>
      <tr>
        <td>ID</td>
        <td>Заголовок новости</td>
        <td>Ссылка на страницу новости</td>
        <td>Ссылка на изображение новости</td>
        <td>Изменить новость</td>
        <td>Удалить новость</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($news as $new)
        <tr>
          <td>{{ $new->id }}</td>
          <td>{{ $new->title }}</td>
          <td><a href="#">[ссылка]</a></td>
          <td><a href="{{ $new->image_url }}">[ссылка]</a></td>
          <td><a href="{{ route('admin-new', ['new_id' => $new->id]) }}">[изменить]</a></td>
          <td>
            <form method="POST" action="{{ route('delete-new') }}">
              @csrf
              <input type="hidden" name="new_id" value="{{ $new->id }}">
              <button class="btn">Удалить новость</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection