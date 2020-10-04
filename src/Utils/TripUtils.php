<?php

namespace App\Utils;

class TripUtils
{
    public static function calculateAverageSpeed(int $distance, int $durationInSecond): float
    {
        $averageSpeed = DistanceUtils::convertMeterToKilometer($distance)/DurationUtils::convertSecondToHoursDecimalBase($durationInSecond);

        return round($averageSpeed, 2);
    }

    public static function calculateAveragePace(float $speed): string
    {
        $pace = intval(60/$speed);
        $decimalPace = 60 % $speed;

        return sprintf('%s\'%s"', $pace, $decimalPace);
    }
}
