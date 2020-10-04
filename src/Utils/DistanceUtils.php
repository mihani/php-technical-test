<?php

namespace App\Utils;

class DistanceUtils
{
    public static function convertMeterToKilometer(int $distance)
    {
        return $distance/1000;
    }
}
