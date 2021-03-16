<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/auth.css">
  <link rel="stylesheet" href="/css/icofont.css">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <title>Вход | Панель администратора</title>
</head>
<body class="bg">
  <main id="main">
    <div class="main__header">Вход в панель администратора</div>
    <form class="form" action="{{ route('login') }}" method="POST">
      @csrf
      <div class="input-icon">
        <p><i class="icofont-login"></i></p>
        <input type="text" name="login" placeholder="Введите Ваш логин" value="{{ old('login') }}">
      </div>

      <div class="input-icon">
        <p><i class="icofont-lock"></i></p>
        <input type="password" name="password" placeholder="Введите Ваш пароль">
      </div>

      @if ($errors->any())
        <div class="messages">
          <div class="messages__error">
            <p><span>[Ошибка]:</span> {{ $errors->first() }}</p>
          </div>
        </div>
      @endif
      
      <button class="btn" type="submit">Войти</button>
      <a class="link" href="{{ route('register') }}">Ещё нет аккаунта?</a>

      
    </form>
  </main>
</body>
</html>