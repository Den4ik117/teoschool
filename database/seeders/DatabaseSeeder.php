<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $permission_1 = Permission::create(['name' => 'dashboard']);

        $permission_2 = Permission::create(['name' => 'verify accounts']);
        $permission_3 = Permission::create(['name' => 'add roles']);
        $permission_4 = Permission::create(['name' => 'remove roles']);

        $permission_5 = Permission::create(['name' => 'create courses']);
        $permission_6 = Permission::create(['name' => 'edit courses']);
        $permission_7 = Permission::create(['name' => 'delete courses']);

        $permission_8 = Permission::create(['name' => 'create lessons']);
        $permission_9 = Permission::create(['name' => 'edit lessons']);
        $permission_10 = Permission::create(['name' => 'delete lessons']);

        $permission_11 = Permission::create(['name' => 'create news']);
        $permission_12 = Permission::create(['name' => 'edit news']);
        $permission_13 = Permission::create(['name' => 'delete news']);

        $permission_14 = Permission::create(['name' => 'create cheats']);
        $permission_15 = Permission::create(['name' => 'edit cheats']);
        $permission_16 = Permission::create(['name' => 'delete cheats']);


        $role_1 = Role::create(['name' => 'admin']);
        $role_1->givePermissionTo($permission_1);
        $role_1->givePermissionTo($permission_2);
        $role_1->givePermissionTo($permission_3);
        $role_1->givePermissionTo($permission_4);
        $role_1->givePermissionTo($permission_5);
        $role_1->givePermissionTo($permission_6);
        $role_1->givePermissionTo($permission_7);
        $role_1->givePermissionTo($permission_8);
        $role_1->givePermissionTo($permission_9);
        $role_1->givePermissionTo($permission_10);
        $role_1->givePermissionTo($permission_11);
        $role_1->givePermissionTo($permission_12);
        $role_1->givePermissionTo($permission_13);
        $role_1->givePermissionTo($permission_14);
        $role_1->givePermissionTo($permission_15);
        $role_1->givePermissionTo($permission_16);

        $role_2 = Role::create(['name' => 'writer']);
        $role_2->givePermissionTo($permission_1);
        $role_2->givePermissionTo($permission_8);
        $role_2->givePermissionTo($permission_9);
        $role_2->givePermissionTo($permission_10);

        $role_3 = Role::create(['name' => 'writer plus']);
        $role_3->givePermissionTo($permission_1);
        $role_3->givePermissionTo($permission_5);
        $role_3->givePermissionTo($permission_6);
        $role_3->givePermissionTo($permission_7);
        $role_3->givePermissionTo($permission_8);
        $role_3->givePermissionTo($permission_9);
        $role_3->givePermissionTo($permission_10);

        $role_4 = Role::create(['name' => 'redactor']);
        $role_4->givePermissionTo($permission_1);
        $role_4->givePermissionTo($permission_11);
        $role_4->givePermissionTo($permission_12);
        $role_4->givePermissionTo($permission_13);

        $role_5 = Role::create(['name' => 'cheater']);
        $role_5->givePermissionTo($permission_1);
        $role_5->givePermissionTo($permission_14);
        $role_5->givePermissionTo($permission_15);
        $role_5->givePermissionTo($permission_16);


        $user = User::create([
          'name' => 'test',
          'surname' => 'test',
          'login' => '123',
          'email' => 'test@mail.ru',
          'user_verified' => true,
          'password' => Hash::make('123456')
        ]);
        $user->assignRole('admin');
    }
}
