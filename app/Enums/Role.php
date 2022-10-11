<?php

namespace App\Enums;

enum Role: int
{
    case Developer = 1;
    case Administrator = 2;
    case CourseCreator = 3;
    case NewsWriter = 4;
    case CheatSheetWriter = 5;
    case Student = 6;

    public function description(): string
    {
        return match ($this) {
            Role::Developer => 'Главный разработчик',
            Role::Administrator => 'Администратор',
            Role::CourseCreator => 'Создатель курсов',
            Role::NewsWriter => 'Корреспондент',
            Role::CheatSheetWriter => 'Главный по шпаргалкам',
            Role::Student => 'Ученик'
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
