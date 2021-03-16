<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/article.css">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <title>{{ $new->title }} • TeoSchool</title>
</head>
<body>

  <header class="header" id="header">
    <div class="container">
      <div class="header__wrapper">
        <a class="logo header__logo" href="{{ route('home') }}">TEO SCHOOL</a>
        <a class="button" href="{{ route('home') }}">Обратно — на главную</a>
      </div>
    </div>
  </header>

  <main>
    <section class="cover">
      <div class="container">
        <div class="cover__row">
          <div>
            <h2 class="cover__description">TEO SCHOOL — образовательная платформа</h2>
            <h1>{{ $new->title }}</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="article" style="min-height: 60vh;">
      <div class="container">
        <div class="article__content">
          <div class="article__title">{{ $new->title }}</div>
          <img src="{{ $new->image_url }}" alt="Image" width="100%" style="max-height: 500px; object-fit: cover; margin-bottom: 32px;">
          <div class="article__simple-text">{{ $new->content }}</div>
        </div>
      </div>
    </section>

    @include('components.subscribe')
  </main>

  @include('components.footer')
  @include('components.metrics')
</body>
</html>
