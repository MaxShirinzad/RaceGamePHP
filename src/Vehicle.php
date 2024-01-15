<?php

class Vehicle
{
    protected string $name;
    protected int $maxSpeed;

    protected string $unit;
    protected float $distance;
    protected int $time;

    public function __construct(string $name, int $maxSpeed, string $unit)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->unit = $unit;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }

    public function setTime(int $time): void
    {
        $this->time = $time;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function getTimeMinute(): float
    {
        return number_format((float)$this->time / 60, 2, '.', '');
    }
}