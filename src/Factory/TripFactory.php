<?php

namespace App\Factory;

use App\Entity\Trip;
use App\Utils\TripUtils;

class TripFactory
{
    public function updateSpeedPaceTrip(Trip $trip): Trip
    {
        $averageSpeed = TripUtils::calculateAverageSpeed(
            $trip->getDistance(),
            $trip->getDuration()
        );

        if ($averageSpeed < 1){
            $averageSpeed = 1;
        }

        $trip->setAveragePace(TripUtils::calculateAveragePace($averageSpeed));
        $trip->setAverageSpeed($averageSpeed);

        return $trip;
    }
}
