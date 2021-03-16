<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/article.css">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <title>Контакты • TeoSchool</title>
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
            <h1>Контакты</h1>
          </div>
          <!-- <img class="cover__image" src="/images/book.png" alt="Книга"> -->
        </div>
      </div>
    </section>

    <section class="article" style="min-height: 60vh;">
      <div class="container">
        <div class="article__content">
          <div class="article__title">Контакты для связи с нами</div>
          <div class="article__subtitle"></div>
          <div class="article__simple-text">Если вас заинтересовал наш сайт, или вы хотите нам написать по какому-либо поводу, или хотите стать частью нашей команды, то пишите нам сюда:</div>
          <div class="article__simple-text ml-32 mt-16">
            Электронная почта: gaz91.91@mail.ru<br>
            Телеграм: <a href="https://t.me/denchik1170" target="_blank">https://t.me/denchik1170</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('components.footer')
  @include('components.metrics')
</body>
</html>
