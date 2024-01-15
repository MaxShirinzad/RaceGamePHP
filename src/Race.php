<?php

class Race
{
    private array $vehicles;
    private int $raceDistance;

    public function __construct(array $vehicles, int $raceDistance)
    {
        $this->vehicles = $vehicles;
        $this->raceDistance = $raceDistance;
    }

    public function runRace(): void
    {
        foreach ($this->vehicles as $vehicle) {
            $time = $this->calculateTime($vehicle);
            $vehicle->setTime($time);
            $vehicle->setDistance($this->raceDistance);
        }
    }

    private function calculateTime(Vehicle $vehicle): int
    {
        $maxSpeed = $vehicle->getMaxSpeed();

        // Convert speed to km/h if it's in knots (kts)
        if ($vehicle->getUnit() == "Kts" or $vehicle->getUnit() == "knots") {
            $maxSpeed *= 1.852; // 1 knot = 1.852 km/h

            //print_r($vehicle->getName() . "\n" . $vehicle->getUnit() . "\n" . 'maxSpeed' . $maxSpeed); // For debugging
        }

        // Calculate time in seconds
        $time = ($this->raceDistance / $maxSpeed) * 3600;
        return round($time);

        //return round(($this->raceDistance / $vehicle->getMaxSpeed()) * 3600);

    }

    public function getWinner(): Vehicle
    {
        usort($this->vehicles, function ($a, $b) {
            return $a->getTime() <=> $b->getTime();
        });

        return $this->vehicles[0];
    }

    public function getRaceDistance(): int
    {
        return $this->raceDistance;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

}