<?php

namespace App\Enums;

enum Part: int
{
    case OnePart = 1;
    case TwoParts = 2;
    case ThreeParts = 3;

    public function description(): string
    {
        return match ($this) {
            Part::OnePart => 'Одна часть',
            Part::TwoParts => 'Две части',
            Part::ThreeParts => 'Три части'
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
