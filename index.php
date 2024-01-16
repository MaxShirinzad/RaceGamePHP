<?php

// Include the necessary classes
require_once 'src/Vehicle.php';
require_once 'src/Race.php';

// Read vehicles from JSON file
$vehiclesJson = file_get_contents('vehicles/vehicles.json');
$vehiclesData = json_decode($vehiclesJson, true);

// Create vehicle objects from the data
$vehicles = array_map(function ($vehicleData) {
    return new Vehicle($vehicleData['name'], $vehicleData['maxSpeed'], $vehicleData['unit']);
}, $vehiclesData);

// Prompt players to choose vehicles
function promptPlayerToChooseVehicle(string $playerNumber, array $vehicles): Vehicle
{
    if ($playerNumber == "One") {
        echo "Player $playerNumber, choose your vehicle:\n";
        foreach ($vehicles as $index => $vehicle) {
            echo $index + 1 . " {$vehicle->getName()}\n";
        }
    }

    $choice = (int) readline("Enter vehicle for Player $playerNumber, choice between 1-" . count($vehicles) . ": ");
    return $vehicles[$choice - 1];
}

/**
 * @param array $vehicles
 * @return void
 */
function playRaceGame(array $vehicles): void
{
    $player1Vehicle = promptPlayerToChooseVehicle("One", $vehicles);
    $player2Vehicle = promptPlayerToChooseVehicle("Two", $vehicles);

    $distance = (int)readline("Please input distance in kilometers: \n");

// Create the race object
    $race = new Race([$player1Vehicle, $player2Vehicle], $distance);

// Run the race
    $race->runRace();

// Get the winner and display the results
    $winner = $race->getWinner();

    echo "\nRace Results:\n";
    echo "Player One select: {$player1Vehicle->getName()}\n";
    echo "Player Two select: {$player2Vehicle->getName()}\n";
    echo "\n";
    echo "Race Distance: {$race->getRaceDistance()} kilometers\n";
    echo "\n";
    foreach ($race->getVehicles() as $vehicle) {
        echo "- {$vehicle->getName()}: {$vehicle->getTime()} seconds ({$vehicle->getTimeMinute()} minutes)\n";
    }
    echo "\nWinner: {$winner->getName()}!\n";
}

playRaceGame($vehicles);