<?php

class Vehicle
{
    protected string $name;
    protected int $maxSpeed;

    protected float $distance;
    protected int $time;

    public function __construct(string $name, int $maxSpeed)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }


}