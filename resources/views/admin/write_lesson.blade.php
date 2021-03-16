@extends('layouts.dashboard')

@section('title', 'Написать урок • Панель администратора')

@section('navigation', 'Написать урок')

@section('head')
  {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
@endsection

@section('scripts')
  {{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
  {{-- <script src="/js/lesson.js"></script> --}}
@endsection

@section('main')
  <div class="main__block">
    <div class="main__block-title">Написать урок</div>
    <form class="form" action="{{ route('create-lesson') }}" method="POST">
      @csrf
      <div class="input-text">
        <p>Выберите курс</p>
        <select name="course_id">
          <option value="">Выберите курс</option>
          @foreach ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option> 
          @endforeach
        </select>
      </div>
      <div class="input-text">
        <p>Заголовок урока</p>
        <input type="text" name="title" placeholder="Заголовок урока" required>
      </div>
      <div class="input-text">
        <p>Подзаголовок урока</p>
        <input type="text" name="subtitle" placeholder="Подзаголовок урока" required>
      </div>
      <div class="input-text">
        <p>Ссылка на картинку</p>
        <input type="text" name="image_url" placeholder="Ссылка на картинку (необязательно)">
      </div>
      <div class="input-text">
        <p>Ссылка на предыдущий урок</p>
        <input type="text" name="prev_lesson" placeholder="Ссылка на предыдущий урок (необязательно)">
      </div>
      <div class="input-text">
        <p>Ссылка на следующий урок</p>
        <input type="text" name="next_lesson" placeholder="Ссылка на следующий урок (необязательно)">
      </div>
      <div class="input-text">
        <p>URL для урока</p>
        <input type="text" name="url" placeholder="URL для урока" required>
      </div>
      <div class="input-text">
        <p>HTML код урока</p>
        <input type="text" name="content" placeholder="HTML код урока" required>
      </div>
      <label><input type="checkbox" name="publish">Опубликовать</label>

      <button class="btn" type="submit">Сохранить</button>
    </form>
  </div>
@endsection