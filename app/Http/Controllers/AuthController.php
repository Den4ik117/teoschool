<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createUser(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]); 
        
        $user->save();

        return back()->with('success', 'Вы успешно отправили заявление на регистрацию!');
    }

    public function loginUser(LoginRequest $request)
    {
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password, 'user_verified' => 1]))
        {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['invalid' => 'Неверный логин/пароль, или администратор не одобрил регистрацию']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showRegister(Request $request)
    {
        return view('register');
    }

    public function showLogin(Request $request)
    {
        return view('login');
    }
}
