<section class="subscribe">
  <div class="container">
    <div class="subscribe__content">
      <p class="heading">Хотите получать новости на тему экзаменов?</p>
      <p class="description">Тогда подпишитесь на нашу новостную рассылку!</p>
      <form class="subscribe__form" method="POST" action="{{ route('subscribe') }}">
        @csrf
        <input class="subscribe__input" style="{{ $errors->any() ? 'border-color: red;' : '' }}" type="email" name="email" placeholder="Введите вашу почту" required>
        <button class="button subscribe__button">Подписаться</button>
      </form>
      @if ($errors->any())
        <p class="subscribe__agree" style="color: red"><span style="font-weight: bold;">[Ошибка]:</span> {{ $errors->first() }}</p> 
      @endif
      @if (\Session::has('success'))
        <p class="subscribe__agree" style="color: green"><span style="font-weight: bold;">[Успех]:</span> {{ \Session::get('success') }}</p> 
      @endif
      <p class="subscribe__agree">Нажимая кнопку «Подписаться», вы соглашаетесь на обработку Ваших персональных данных и соглашаетесь с <a href="{{ route('privacy') }}" target="_blank">политикой конфиденциальности</a></p>
    </div>
  </div>
</section>