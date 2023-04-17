<?php

namespace App\Enums;

enum ExerciseStatus: string
{
    case InWork = 'IN_WORK';
    case Overdue = 'OVERDUE';
    case Completed = 'COMPLETED';

    public function label(): string
    {
        return match ($this) {
            self::InWork => 'В работе',
            self::Overdue => 'Просрочено',
            self::Completed => 'Выполнено',
        };
    }
}
