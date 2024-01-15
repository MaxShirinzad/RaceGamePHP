<?php

// Include the necessary classes
require_once 'src/Vehicle.php';
require_once 'src/Race.php';

// Read vehicles from JSON file
$vehiclesJson = file_get_contents('vehicles/vehicles.json');
$vehiclesData = json_decode($vehiclesJson, true);

//// Load the list of vehicles from vehicles.json
//$vehiclesJson = file_get_contents('vehicles.json');
//$vehicles = json_decode($vehiclesJson, true);

//print_r($vehiclesJson);

// Create vehicle objects from the data
$vehicles = array_map(function ($vehicleData) {
//    return new Vehicle($vehicleData['name'], $vehicleData['maxSpeed'], $vehicleData['unit']);
    return new Vehicle($vehicleData['name'], $vehicleData['maxSpeed'], $vehicleData['unit']);
}, $vehiclesData);
//}, $vehiclesData['vehicles']);

// Prompt player 1 to choose a vehicle
echo "Player 1, choose your vehicle:\n";
foreach ($vehicles as $index => $vehicle) {
//    echo "{$index}. {$vehicle->getName()}\n";
    echo $index + 1 . " {$vehicle->getName()}\n";
}
$player1Choice = (int) readline("Enter vehicle for Player One, choice between 1-10: ");
$player1Vehicle = $vehicles[$player1Choice - 1];

// Prompt player 2 to choose a vehicle
$player2Choice = (int) readline("Enter the number of Player Two, choice between 1-10: ");
$player2Vehicle = $vehicles[$player2Choice - 1];

$distance = (int) readline("Please input distance in kilometers: \n ");

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
    echo "- {$vehicle->getName()}: {$vehicle->getTime()} seconds({$vehicle->getTimeMinute()} minutes)\n";
}
echo "\nWinner: {$winner->getName()}!\n";