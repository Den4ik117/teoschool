<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/dashboard.css">
  <link rel="stylesheet" href="/css/icofont.css">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <title>@yield('title')</title>
  @yield('head')
</head>
<body>

  <header id="header">
    <div class="header__logo">
      <img src="/images/logo.png" alt="logo.png">
      <p>Панель администратора</p>
    </div>
    <div class="header__nav">
      <div class="header__left">
        <div class="header__icon w50 h50"><i class="icofont-navigation-menu"></i></div>
        <div class="header__online">
          <p>{{ \Request::ip() }}</p>
        </div>
      </div>
      <div class="header__right">
        <div class="header__icon w50 h50">
          <a href="{{ route('logout') }}"><i class="icofont-logout"></i></a>
        </div>
      </div>
    </div>
  </header>

  <div id="content">
    <aside id="aside">
      <div class="aside__user">
        <div class="aside__about">
          <div class="aside__logo bg"></div>
          <div>
            <p>{{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
            <p class="aside__role">{{ Auth::user()->getRoleNames()[0] }}</p>
          </div>
        </div>
        <div class="aside__settings">
          <a href="#"><i class="icofont-settings"></i></a>
        </div>
      </div>
      <nav class="aside__nav">
        <ul>
          <li class="aside__nav-title">Навигация</li>
          <li class="aside__nav-item">
            <a href="{{ route('dashboard') }}"><i class="icofont-home"></i>Главная</a>
          </li>
          @can('create news')
            <li class="aside__nav-item">
              <a href="{{ route('admin-news') }}"><i class="icofont-newspaper"></i>Новости</a>
            </li>
          @endcan
          @can('create cheats')
            <li class="aside__nav-item">
              <a href="{{ route('admin-cheats') }}"><i class="icofont-table"></i>Шпаргалки</a>
            </li>
          @endcan
          @can('create lessons')
            <li class="aside__nav-item">
              <a href="{{ route('write-lesson') }}"><i class="icofont-pen-alt-2"></i>Написать урок</a>
            </li>
            <li class="aside__nav-item">
              <a href="{{ route('admin-lessons') }}"><i class="icofont-list"></i>Все уроки</a>
            </li>
          @endcan
          @can('create courses')
            <li class="aside__nav-item">
              <a href="{{ route('admin-courses') }}"><i class="icofont-contact-add"></i>Курсы</a>
            </li>
          @endcan
          @can('add roles')
            <li class="aside__nav-item">
              <a href="{{ route('admin-roles') }}"><i class="icofont-paper"></i>Роли и разрешения</a>
            </li>
          @endcan
          {{-- <li class="aside__nav-item">
            <a href="#"><i class="icofont-settings"></i>Настройки</a>
          </li> --}}
        </ul>
      </nav>
    </aside>
    <main id="main">
      <div class="main__title">
        <div class="main__title-left"><p><strong>Панель администратора</strong><span class="delimiter">/</span>@yield('navigation')</p></div>
      </div>
      <div class="main__content">

        @if ($errors->any())
          <div class="main__block">
            <div class="main__block-title">Ошибка!</div>
            <div class="messages">
              <div class="messages__error">
                <p style="color: red;"><span>[Ошибка]:</span> {{ $errors->first() }}</p>
              </div>
            </div>
          </div>
        @endif

        @if (\Session::has('success'))
          <div class="main__block">
            <div class="main__block-title">Успех!</div>
            <p class="success"><span>[Успех]:</span> {{ \Session::get('success') }}</p>
          </div>
        @endif

        @yield('main')
      </div>
    </main>
  </div>

  @yield('scripts')
</body>
</html>