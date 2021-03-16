<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/auth.css">
  <link rel="stylesheet" href="/css/icofont.css">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <title>Регистрация | Панель администратора</title>
</head>
<body class="bg">
  <main id="main">
    <div class="main__header">Регистрация в панели администратора</div>
    <form class="form" action="{{ route('register') }}" method="POST">
      @csrf
      <div class="input-icon">
        <p><i class="icofont-slightly-smile"></i></p>
        <input type="text" name="name" placeholder="Введите своё имя" value="{{ old('name') }}">
      </div>

      <div class="input-icon">
        <p><i class="icofont-simple-smile"></i></p>
        <input type="text" name="surname" placeholder="Введите свою фамилию" value="{{ old('surname') }}">
      </div>

      <div class="input-icon">
        <p><i class="icofont-login"></i></p>
        <input type="text" name="login" placeholder="Придумайте себе логин" value="{{ old('login') }}">
      </div>

      <div class="input-icon">
        <p><i class="icofont-ui-email"></i></p>
        <input type="email" name="email" placeholder="Введите свою почту" value="{{ old('email') }}">
      </div>

      <div class="input-icon">
        <p><i class="icofont-ui-password"></i></p>
        <input type="password" name="password" placeholder="Придумайте себе пароль">
      </div>

      <div class="input-icon">
        <p><i class="icofont-ui-password"></i></p>
        <input type="password" name="password_confirmation" placeholder="Повторите пароль">
      </div>

      <label><input type="checkbox" name="agree">Я соглашаюсь на обработку моих данных и соглашаюсь с <a class="policy" href="{{ route('privacy') }}" target="_blank">политикой конфиденциальности</a></label>

      @if ($errors->any())
        <div class="messages">
          <div class="messages__error">
            <p><span>[Ошибка]:</span> {{ $errors->first() }}</p>
          </div>
        </div>
      @endif

      @if (\Session::has('success'))
        <div class="messages">
          <div class="messages__success">
            <p><span>[Успех]:</span> {{ \Session::get('success') }}</p>
          </div>
        </div>
      @endif

      <button class="btn" type="submit">Зарегистрироваться</button>
      <a class="link" href="{{ route('login') }}">Уже есть аккаунт?</a>
    </form>
  </main>
  
  @include('components.metrics')
</body>
</html>
