<?php

namespace Database\Seeders;

use App\Models\Cheatsheet;
use App\Models\Information;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            ModuleSeeder::class,
        ]);

        Cheatsheet::factory(10)->create();
        Information::factory(10)->create();
    }
}
