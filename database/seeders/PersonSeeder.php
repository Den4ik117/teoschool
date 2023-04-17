<?php

namespace Database\Seeders;

use App\Enums\ExerciseStatus;
use App\Enums\PersonGrade;
use App\Models\Person;
use App\Models\User;
use App\Models\WorkingClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    const EXERCISES = [
        ['Домашняя работа', 'Выполнить упражнения 5-10'],
        ['Домашняя работа', 'Выполнить упражнения 10-15'],
        ['Домашняя работа', 'Выполнить упражнения 15-20'],
        ['Работа по дому', 'Вытереть пыль'],
        ['Работа по дому', 'Заправить кровать'],
        ['Помощь по дому', 'Купить машину'],
        ['Помощь по дому', 'Починить кран'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::query()->whereNotIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11])->get()->toQuery()->delete();

        $personDirector = User::query()->firstWhere('email', 'admin@mail.ru')->person()->create([
            'grade' => PersonGrade::Director,
        ]);

        $this->createExercisesForPerson($personDirector);

        $classes = WorkingClass::all();

        foreach ($classes as $wClass) {
            $personsNumber = fake()->numberBetween(20, 30);

            for ($i = 0; $i < $personsNumber; $i++) {
                $person = User::factory()->create()->person()->create([
                    'grade' => PersonGrade::Student,
                ]);

                $this->createExercisesForPerson($person);

                $wClass->persons()->attach($person->id);
            }

            $wClass->persons()->attach($personDirector->id);
        }
    }

    private function createExercisesForPerson(Person $person): void
    {
        $exerciseNumber = fake()->numberBetween(2, 5);

        for ($j = 0; $j < $exerciseNumber; $j++) {
            [$name, $content] = fake()->randomElement(self::EXERCISES);

            $person->exercises()->create([
                'name' => $name,
                'content' => $content,
                'status' => ExerciseStatus::InWork,
                'reward' => fake()->numberBetween(50, 100),
            ]);
        }
    }
}
