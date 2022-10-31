<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    const DESCRIPTIONS = [
        'изучение основ', 'знакомство с предметом', 'работа с переменными',
        'первые операторы', 'окончание изучения предмета', 'середина изучения предмета',
        'работа с числами', 'погружение в предмет', 'становление гуру',
        'учимся складывать', 'учимся делить на ноль', 'первый замечательный предел',
    ];

    const PARTS_NAMES = [
        'Теория к заданиям',
        'Теоретическое занятие №1',
        'Теоретическое занятие №2',
        'Теоретическое занятие №7',
        'Практика',
        'Практическое занятие',
        'Задание 1',
        'Работа с файлами',
        'Лабораторная работа дома',
    ];

    public function run()
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            for ($i = 1; $i <= rand(17, 27); $i++) {
                $part = $i < 15 ? 1 : 2;

                $module = $course->modules()->create([
                    'part' => $course->parts->value === 1 ? 1 : $part,
                    'task' => "$i задание",
                    'description' => fake()->randomElement(self::DESCRIPTIONS)
                ]);

                for ($j = 0; $j < rand(4, 12); $j++) {
                    $module->parts()->create([
                        'name' => fake()->randomElement(self::PARTS_NAMES),
                        'content' => 'Какой-то контент, который содержит <b>HTML</b> разметку',
                        'tasks' => '[]'
                    ]);
                }
            }
        }
    }
}
