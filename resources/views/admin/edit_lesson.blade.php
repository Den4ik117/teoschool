@extends('layouts.dashboard')

@section('title', 'Редактировать урок • Панель администратора')

@section('navigation', 'Редактировать урок')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Редактировать урок</div>
    <form class="form" action="{{ route('edit-lesson') }}" method="POST">
      @csrf
      <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
      <div class="input-text">
        <p>Выберите курс</p>
        <select name="course_id">
          <option value="">Выберите курс</option>
          @foreach ($courses as $course)
            <option value="{{ $course->id }}" {{ $course->id == $lesson->course_id ? 'selected' : '' }}>{{ $course->name }}</option> 
          @endforeach
        </select>
      </div>
      <div class="input-text">
        <p>Заголовок урока</p>
        <input type="text" name="title" placeholder="Заголовок урока" value="{{ $lesson->title }}" required>
      </div>
      <div class="input-text">
        <p>Подзаголовок урока</p>
        <input type="text" name="subtitle" placeholder="Подзаголовок урока" value="{{ $lesson->subtitle }}" required>
      </div>
      <div class="input-text">
        <p>Ссылка на картинку</p>
        <input type="text" name="image_url" placeholder="Ссылка на картинку (необязательно)" value="{{ $lesson->image_url }}">
      </div>
      <div class="input-text">
        <p>Ссылка на предыдущий урок</p>
        <input type="text" name="prev_lesson" placeholder="Ссылка на предыдущий урок (необязательно)" value="{{ $lesson->prev_lesson }}">
      </div>
      <div class="input-text">
        <p>Ссылка на следующий урок</p>
        <input type="text" name="next_lesson" placeholder="Ссылка на следующий урок (необязательно)" value="{{ $lesson->next_lesson }}">
      </div>
      <div class="input-text">
        <p>URL для урока</p>
        <input type="text" name="url" placeholder="URL для урока" value="{{ $lesson->url }}" required>
      </div>
      <div class="input-text">
        <p>HTML код урока</p>
        <input type="text" name="content" placeholder="HTML код урока" value="{{ $lesson->content }}" required>
      </div>
      <label><input type="checkbox" name="publish" {{ $lesson->publish ? 'checked' : '' }}>Опубликовать</label>

      <button class="btn" type="submit">Сохранить</button>
    </form>
  </div>
@endsection