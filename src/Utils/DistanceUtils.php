<?php

namespace App\Utils;

class DistanceUtils
{
    public static function convertMeterToKilometer(int $distance): float
    {
        return $distance/1000;
    }
}
