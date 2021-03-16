@extends('layouts.dashboard')

@section('title', 'Редактировать новость • Панель администратора')

@section('navigation', 'Редактировать новость')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Создать новость</div>
    <form class="form" action="{{ route('edit-new') }}" method="POST">
      @csrf
      <input type="hidden" name="new_id" value="{{ $new->id }}">
      <div class="input-text">
        <p>Заголовок</p>
        <input type="text" name="title" placeholder="Заголовок" value="{{ $new->title }}" required>
      </div>
      <div class="input-text">
        <p>Содержание новости</p>
        <input type="text" name="content" placeholder="Содержание новости" value="{{ $new->content }}" required>
      </div>
      <div class="input-text">
        <p>URL картинки новости</p>
        <input type="text" name="image_url" placeholder="URL картинки новости" value="{{ $new->image_url }}" required>
      </div>
      <button class="btn" type="submit">Сохранить</button>
    </form>
  </div>
@endsection