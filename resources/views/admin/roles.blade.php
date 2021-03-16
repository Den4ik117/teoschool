@extends('layouts.dashboard')

@section('title', 'Роли и разрешения • Панель администратора')

@section('navigation', 'Роли и разрешения')

@section('main')
  <div class="main__block">
    <div class="main__block-title">Назначить роль</div>
    <form class="form" action="{{ route('add-role') }}" method="POST">
      @csrf
      <div class="input-text">
        <p>Введите ID пользователя</p>
        <input type="number" name="user_id" placeholder="Введите ID пользователя" required>
      </div>
      <div class="input-text">
        <p>Выберите одну из ролей</p>
        <select name="role_name">
          <option value="">Выберите одну из ролей</option>
          @foreach ($roles as $role)
            <option>{{ $role->name }}</option>
          @endforeach
        </select>
      </div>
      <button class="btn" type="submit">Сохранить</button>
    </form>
  </div>

  <div class="main__block">
    <div class="main__block-title">Отозвать роль</div>
    <form class="form" action="{{ route('remove-role') }}" method="POST">
      @csrf
      <div class="input-text">
        <p>Введите ID пользователя</p>
        <input type="number" name="user_id" placeholder="Введите ID пользователя" required>
      </div>
      <div class="input-text">
        <p>Выберите одну из ролей</p>
        <select name="role_name">
          <option value="">Выберите одну из ролей</option>
          @foreach ($roles as $role)
            <option>{{ $role->name }}</option>
          @endforeach
        </select>
      </div>
      <button class="btn" type="submit">Сохранить</button>
    </form>
  </div>

  <table class="table">
    <thead>
      <tr>
        <td>ID</td>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>Логин</td>
        <td>Почта</td>
        <td>Верифицирован</td>
        <td>Роли</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->surname }}</td>
          <td>{{ $user->login }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if ($user->user_verified)
              <p class="success">[Аккаунт верифицирован]</p>
            @else
              <form method="POST" action="{{ route('verify') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button class="btn">Одобрить регистрацию</button>
              </form>
            @endif
          </td>
          <td>{{ $user->getRoleNames() }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection