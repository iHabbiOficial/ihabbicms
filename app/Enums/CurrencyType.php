<?php

namespace App\Enums;

enum CurrencyType: int
{
    case Credits = -1;
    case Duckets = 0;
    case Diamonds = 5;
    case Points = 104;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toInput(): array
    {
        $allCurrencies = self::cases();

        return array_combine(
            array_column($allCurrencies, 'value'),
            array_column($allCurrencies, 'name'),
        );
    }
}
