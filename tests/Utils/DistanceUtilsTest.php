<?php

namespace App\Tests\Utils;

use App\Utils\DistanceUtils;
use PHPUnit\Framework\TestCase;

class DistanceUtilsTest extends TestCase
{
    public function testConvertMeterToKilometerSuccess()
    {
        $testDistance = 2000;

        $this->assertEquals(2,DistanceUtils::convertMeterToKilometer($testDistance));
    }

    public function testConvertMeterToKilometerFail()
    {
        $testDistance = 2000;

        $this->assertNotEquals(20,DistanceUtils::convertMeterToKilometer($testDistance));
    }

}
