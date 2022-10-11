<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $users = User::all();

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::cases();

        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255',
            'role' => 'required|string|in:' . implode(',', Role::values())
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return to_route('dashboard.users.create')->with('success', 'Пользователь успешно добавлен!');
    }

    public function edit(User $user)
    {
        $roles = Role::cases();

        return view('dashboard.users.edit', compact(['user', 'roles']));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|in:' . implode(',', Role::values())
        ]);

        if ($user->id === auth()->user()->id && $user->role !== $request->role)
            throw ValidationException::withMessages(['role' => 'Вы не можете изменить роль самому себе!']);

        $user->update($validated);

        return to_route('dashboard.users.index')->with('success', 'Пользователь успешно изменён!');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->user()->id)
            throw ValidationException::withMessages(['user' => 'Вы не можете удалить самого себя!']);

        $user->delete();

        return to_route('dashboard.users.index')->with('success', 'Пользователь успешно удалён!');
    }
}
