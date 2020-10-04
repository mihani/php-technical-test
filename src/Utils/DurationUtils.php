<?php

namespace App\Utils;

class DurationUtils
{
    private const SECOND_CONVERT_UNIT = 3600;

    /**
     * @return float|int
     */
    public static function convertToSecond(array $duration)
    {
        $durationInSecond = $duration['seconds'];
        $durationInSecond += $duration['minutes']*60;
        $durationInSecond += $duration['hours']*self::SECOND_CONVERT_UNIT;

        return $durationInSecond;
    }

    public static function convertSecondToHoursDecimalBase(int $durationInSecond): float
    {
        return $durationInSecond/self::SECOND_CONVERT_UNIT;
    }
}
