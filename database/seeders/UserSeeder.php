<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Ivan',
            'last_name' => 'Ivanov',
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'role' => Role::Developer,
            'password' => Hash::make('password')
        ]);

        User::factory(10)->create();
    }
}
