<?php

namespace Database\Seeders;

use App\Models\WorkingClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkingClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkingClass::query()->create(['name' => '9А']);
        WorkingClass::query()->create(['name' => '9Б']);
        WorkingClass::query()->create(['name' => '9В']);
        WorkingClass::query()->create(['name' => '9Г']);
        WorkingClass::query()->create(['name' => '10А']);
        WorkingClass::query()->create(['name' => '11А']);
    }
}
