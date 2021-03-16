<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/article.css">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <title>{{ $lesson->title }} • TeoSchool</title>
</head>
<body>

  <header class="header" id="header">
    <div class="container">
      <div class="header__wrapper">
        <a class="logo header__logo" href="/">TEO SCHOOL</a>
        <div class="header__title">
          <div class="header__center" v-on:click="isActiveMenu = !isActiveMenu">
            <strong>{{ $lesson->title }}</strong><p class="header__description"></p>
            {{-- <strong>Задание 1:</strong><p class="header__description">понимание главной информации текста</p> --}}
            <svg height="512px" viewBox="0 0 512 512" width="512px" xml:space="preserve"><path d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9  c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3  z"/></svg>
          </div>

          <div class="header__drop_down" v-if="isActiveMenu">
            <ul>
              @foreach ($course->lessons as $otherLesson)
                @if ($lesson->id != $otherLesson->id && $otherLesson->publish)
                  <li><a href="{{ route('show-lesson', ['course_url' => $course->url, 'lesson_url' => $otherLesson->url]) }}"><strong>{{ $otherLesson->title }}</strong></a></li>
                  {{-- <li><a href="#"><strong>Задание 2:</strong> понимание главной информации текста</a></li> --}}
                @endif
              @endforeach
            </ul>
          </div>
        </div>
        <a class="button" href="/#courses">Курс «{{ $course->name }}»</a>
      </div>
    </div>
  </header>

  <main>
    <section class="cover">
      <div class="container">
        <div class="cover__row">
          <div>
            <h2 class="cover__description">{{ $lesson->subtitle }}</h2>
            <h1>{{ $lesson->title }}</h1>
          </div>
          <img class="cover__image" src="{{ $lesson->image_url }}" alt="Image">
        </div>
      </div>
    </section>

    <section class="article">
      <div class="container">
        <div class="article__content">{!! $lesson->content !!}</div>
        <div class="article__footer">
          @if ($lesson->prev_lesson)
          {{-- article__task-gray --}}
            <a class="article__task" href="{{ $lesson->prev_lesson }}">« Предыдущее задание</a>
            <a class="article__task article__task-tiny" href="{{ $lesson->prev_lesson }}">« Пред.</a>
          @else
            <a class="article__task article__task-gray" href="#"></a>
            <a class="article__task article__task-tiny article__task-gray" href="#"></a>
          @endif

          @if ($lesson->next_lesson)
            <a class="article__task article__task-tiny" href="{{ $lesson->next_lesson }}">След. »</a>
            <a class="article__task" href="{{ $lesson->next_lesson }}">Следующее задание »</a>
          @endif
        </div>
      </div>
    </section>

    @include('components.subscribe')
  </main>

  @include('components.footer')

  @include('components.metrics')
  <script src="https://unpkg.com/vue@next"></script>
  <script src="/js/article.js"></script>
</body>
</html>
