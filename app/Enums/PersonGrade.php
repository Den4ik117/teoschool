<?php

namespace App\Enums;

enum PersonGrade: string
{
    case Director = 'DIRECTOR';
    case HeadTeacher = 'HEAD_TEACHER';
    case Teacher = 'TEACHER';
    case Student = 'STUDENT';
    case Parent = 'PARENT';

    public function label(): string
    {
        return match ($this) {
            self::Director => 'Директор школы',
            self::HeadTeacher => 'Завуч',
            self::Teacher => 'Учитель',
            self::Student => 'Ученик',
            self::Parent => 'Родитель'
        };
    }

    public function who(): string
    {
        return match ($this) {
            self::Director => 'директора школы',
            self::HeadTeacher => 'завуча',
            self::Teacher => 'учителя',
            self::Student => 'ученика',
            self::Parent => 'родителя'
        };
    }
}
