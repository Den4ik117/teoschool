<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #preloader {
            width: 100vw;
            height: 100vh;
            position: fixed;
            background: #fff;
            z-index: 3;
        }

        #preloader.loaded {
            transition: .3s opacity;
            opacity: 0;
        }

        #preloader-image {
            display: block;
            margin: 30vh auto 0;
        }
    </style>
    @vite('resources/scss/index.scss')
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Бесплатные курсы для подготовки к ЕГЭ • TeoSchool</title>
</head>
<body>
<div id="preloader">
    <img id="preloader-image" src="{{ Vite::asset('resources/images/loading.gif') }}" alt="Loading...">
</div>
<div class="transparent" id="main"></div>
<div id="headers">
    <header class="header" id="header">
        <div class="container">
            <div class="header__wrapper">
                <a class="logo header__logo" href="#main">TEO SCHOOL</a>
                <img src="{{ Vite::asset('resources/images/menu.svg') }}" alt="Меню" class="header__menu" v-on:click="isActiveMenu = true">
                <nav class="nav">
                    <ul>
                        <li class="header__link header__link-active"><a href="#main">Главная</a></li>
                        <li class="header__link"><a href="#courses">Курсы</a></li>
                        <li class="header__link"><a href="#news">Новости</a></li>
                        <li class="header__link"><a href="#cheats">Шпаргалки</a></li>
                    </ul>
                </nav>
                <a class="button" href="#courses">Мне интересно!</a>
            </div>
        </div>
    </header>
    <div class="header top_header" id="top_header">
        <div class="container">
            <div class="header__wrapper">
                <a class="logo header__logo" href="#main">TEO SCHOOL</a>
                <img src="{{ Vite::asset('resources/images/menu.svg') }}" alt="Меню" class="header__menu" v-on:click="isActiveMenu = true">
                <nav class="nav">
                    <ul>
                        <li class="header__link" id="header__link-1"><a href="#main">Главная</a></li>
                        <li class="header__link" id="header__link-2"><a href="#courses">Курсы</a></li>
                        <li class="header__link" id="header__link-3"><a href="#news">Новости</a></li>
                        <li class="header__link" id="header__link-4"><a href="#cheats">Шпаргалки</a></li>
                    </ul>
                </nav>
                <a class="button" href="#courses">Мне интересно!</a>
            </div>
        </div>
    </div>
    <div class="overmenu" v-if="isActiveMenu">
        <div class="overmenu__image">
            <img src="{{ Vite::asset('resources/images/close.svg') }}" alt="Закрыть" v-on:click="isActiveMenu = false">
        </div>
        <ul>
            <li class="header__link"><a href="#main" v-on:click="isActiveMenu = false">Главная</a></li>
            <li class="header__link"><a href="#courses" v-on:click="isActiveMenu = false">Курсы</a></li>
            <li class="header__link"><a href="#news" v-on:click="isActiveMenu = false">Новости</a></li>
            <li class="header__link"><a href="#cheats" v-on:click="isActiveMenu = false">Шпаргалки</a></li>
        </ul>
    </div>
</div>
<main>
    <section class="cover">
        <div class="cover__wrapper">
            <h1>Интенсивные курсы для подготовки к ЕГЭ за 3 месяца!</h1>
            <h2 class="description cover__description">На этом сайте вы можете найти несколько
                <strong>бесплатных</strong> курсов для подготовки к экзаменам, которые включают в себя теоретические
                материалы, практические задания и шпаргалки.</h2>
            <div class="cover__cta">
                <a class="button" href="#courses">Посмотреть курсы</a>
                <a class="button button-transparent" href="#than">Узнать больше</a>
            </div>
        </div>
    </section>
    <section class="than" id="than">
        <div class="container">
            <p class="heading">Чем мы будем полезны?</p>
            <p class="description">Вот краткий список наших преимуществ, который отличает нас от других</p>
            <div class="than__row">
                <div class="than__item">
                    <img class="than__image" src="{{ Vite::asset('resources/images/than-1.svg') }}" alt="Экономия денег">
                    <p class="than__heading">Экономия денег</p>
                    <p class="than__description">Курсы, представленные на сайте, абсолютно бесплатны. Вам не придётся
                        платить.</p>
                </div>
                <div class="than__item">
                    <img class="than__image" src="{{ Vite::asset('resources/images/than-2.svg') }}" alt="Устраняем пробелы">
                    <p class="than__heading">Устраняем пробелы</p>
                    <p class="than__description">Вся информация, представленная в курсах, четко структурирована. Вам не
                        придётся бегать в поисках материала.</p>
                </div>
                <div class="than__item">
                    <img class="than__image" src="{{ Vite::asset('resources/images/than-3.svg') }}" alt="Рассказываем новости">
                    <p class="than__heading">Рассказываем новости</p>
                    <p class="than__description">Вы всегда будете в курсе последних новостей из мира ОГЭ и ЕГЭ.</p>
                </div>
                <div class="than__item">
                    <img class="than__image" src="{{ Vite::asset('resources/images/than-4.svg') }}" alt="Не требует регистрации">
                    <p class="than__heading">Не требует регистрации</p>
                    <p class="than__description">Чтобы начать проходить курс, Вам не нужно регистрироваться на
                        сайте.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="whom">
        <p class="heading">Кому мы будем полезны?</p>
        <p class="description whom__description">Прежде всего, мы ориентируемся на учеников, у которых до экзамена
            осталось менее 3-х месяцев и которым подготовиться надо быстро и эффективно; но мы также и не забываем об
            учениках 9-х и 10-х классов, друзья, этот сайт подойдёт и для Вас!</p>
    </section>
    <section class="how">
        <p class="heading">Как мы будем полезны?</p>
        <p class="description">Перечень того, как вы будете учиться</p>
        <div class="how__timeline">
            <div class="how__grid">
                <div class="how__left">
                    <p class="how__step">Первый шаг</p>
                    <p class="how__description">Найдите и выберите подходящий курс в разделе «Курсы»</p>
                </div>
                <div class="how__center">
                    <div class="how__circle"></div>
                    <div class="how__line"></div>
                </div>
                <div class="how__right"></div>

                <div class="how__left"></div>
                <div class="how__center">
                    <div class="how__circle"></div>
                    <div class="how__line"></div>
                </div>
                <div class="how__right">
                    <p class="how__step">Второй шаг</p>
                    <p class="how__description">Выбрав курс, щёлкайте на те номера заданий из ЕГЭ, с которыми у вас
                        имеются сложности, и приступайте к изучению материала</p>
                </div>

                <div class="how__left">
                    <p class="how__step">Третий шаг</p>
                    <p class="how__description">Прочитав теоретический материал и хорошо обдумав его, приступайте к
                        выполнению практических заданий, которые помогут закрепить материал</p>
                </div>
                <div class="how__center">
                    <div class="how__circle"></div>
                    <div class="how__line"></div>
                </div>
                <div class="how__right"></div>
            </div>
        </div>
    </section>
    <section class="cta">
        <p class="heading cta__heading">Готовы начать учиться? Тогда за дело!</p>
        <a class="button" href="#courses">Посмотреть курсы</a>
    </section>
    <section class="courses" id="courses"></section>

    <section class="news" id="news"></section>

    <section class="cheats" id="cheats"></section>

    @include('includes.subscribe')
</main>

@include('includes.footer')

@vite('resources/js/index.js')
</body>
</html>
