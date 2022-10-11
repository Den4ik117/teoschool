<?php

namespace App\Enums;

enum Part: string
{
    case OnePart = 'Одна часть';
    case TwoParts = 'Две части';
    case ThreeParts = 'Три части';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
