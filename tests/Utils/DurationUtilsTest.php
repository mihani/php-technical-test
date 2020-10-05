<?php

namespace App\Tests\Utils;

use App\Utils\DurationUtils;
use PHPUnit\Framework\TestCase;

class DurationUtilsTest extends TestCase
{
    public function testConvertToSecondSuccess()
    {
        $testDuration = [
            'hours' => 2,
            'minutes' => 15,
            'seconds' => 25
        ];

        $this->assertEquals(8125, DurationUtils::convertToSecond($testDuration));
    }

    public function testConvertToSecondFail()
    {
        $testDuration = [
            'hours' => 2,
            'minutes' => 15,
            'seconds' => 30
        ];

        $this->assertNotEquals(8125, DurationUtils::convertToSecond($testDuration));
    }

    public function testConvertSecondToHoursDecimalBaseSuccess()
    {
        $testDurationInSecond = 3600;

        $this->assertEquals(1, DurationUtils::convertSecondToHoursDecimalBase($testDurationInSecond));
    }

    public function testConvertSecondToHoursDecimalBaseFail()
    {
        $testDurationInSecond = 3600;

        $this->assertNotEquals(2, DurationUtils::convertSecondToHoursDecimalBase($testDurationInSecond));
    }
}
