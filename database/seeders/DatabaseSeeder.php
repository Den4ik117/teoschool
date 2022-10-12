<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cheatsheet;
use App\Models\Information;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CourseSeeder::class);

        Cheatsheet::factory(10)->create();
        Information::factory(10)->create();
    }
}
