<?php

namespace App\Tests\Factory;

use App\Entity\Trip;
use App\Factory\TripFactory;
use PHPUnit\Framework\TestCase;

class TripFactoryTest extends TestCase
{
    public function testUpdateSpeedPaceTripSuccess()
    {
        $tripFactory = new TripFactory();

        $distance = 2000;
        $duration = 1800;

        $referenceTrip = (new Trip())
            ->setDuration($duration)
            ->setDistance($distance)
            ->setAveragePace('15\'0"')
            ->setAverageSpeed(4);

        $testTrip = (new Trip())
            ->setDuration($duration)
            ->setDistance($distance);

        $testTrip = $tripFactory->updateSpeedPaceTrip($testTrip);

        $this->assertEquals($referenceTrip->getAveragePace(), $testTrip->getAveragePace());
        $this->assertEquals($referenceTrip->getAverageSpeed(), $testTrip->getAverageSpeed());
    }

    public function testUpdateSpeedPaceTripFail()
    {
        $tripFactory = new TripFactory();

        $duration = 3000;
        $distance = 2000;

        $referenceTrip = (new Trip())
            ->setDuration($duration)
            ->setDistance($distance)
            ->setAveragePace('15\'0"')
            ->setAverageSpeed(4);

        $testTrip = (new Trip())
            ->setDuration($duration)
            ->setDistance($distance);

        $testTrip = $tripFactory->updateSpeedPaceTrip($testTrip);

        $this->assertNotEquals($referenceTrip->getAveragePace(), $testTrip->getAveragePace());
        $this->assertNotEquals($referenceTrip->getAverageSpeed(), $testTrip->getAverageSpeed());
    }
}
