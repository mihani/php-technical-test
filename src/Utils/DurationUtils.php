<?php

namespace App\Utils;

class DurationUtils
{
    private const SECOND_CONVERT_UNIT = 3600;

    public static function convertToSecond(array $duration): int
    {
        $durationInSecond = (int) $duration['seconds'];
        $durationInSecond += (int) $duration['minutes']*60;
        $durationInSecond += (int) $duration['hours']*self::SECOND_CONVERT_UNIT;

        return $durationInSecond;
    }

    public static function convertSecondToHoursDecimalBase(int $durationInSecond): float
    {
        return $durationInSecond/self::SECOND_CONVERT_UNIT;
    }
}
