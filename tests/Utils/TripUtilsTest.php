<?php

namespace App\Tests\Utils;

use App\Utils\TripUtils;
use PHPUnit\Framework\TestCase;

class TripUtilsTest extends TestCase
{
    public function testCalculateAverageSpeedSuccess()
    {
        $this->assertEquals(10.91, TripUtils::calculateAverageSpeed(2000,660));
    }

    public function testCalculateAverageSpeedFail()
    {
        $this->assertNotEquals(10.91 , TripUtils::calculateAverageSpeed(2000,661));
    }

    public function testCalculateAveragePaceSuccess()
    {
        $this->assertEquals('5\'0"', TripUtils::calculateAveragePace(10.91));
    }

    public function testCalculateAveragePaceFail()
    {
        $this->assertNotEquals('5\'0"', TripUtils::calculateAveragePace(11));
    }
}
