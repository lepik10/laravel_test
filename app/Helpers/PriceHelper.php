<?php

namespace App\Helpers;

class PriceHelper
{
    /**
     * Перевод денег в нужный формат
     * @param float $price
     * @return string
     */
    static function format(float $price) : string
    {
        return number_format($price, 2, '.', ' ');
    }
}
