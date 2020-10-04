<?php

namespace App\Factory;

use App\Entity\Trip;
use App\Utils\DurationUtils;
use App\Utils\TripUtils;

class TripFactory
{
    public function updateSpeedPaceTrip(Trip $trip): Trip
    {
        $averageSpeed = TripUtils::calculateAverageSpeed(
            $trip->getDistance(),
            DurationUtils::convertToSecond($trip->getDuration())
        );

        $trip->setAveragePace(TripUtils::calculateAveragePace($averageSpeed));
        $trip->setAverageSpeed($averageSpeed);

        return $trip;
    }
}
