<?php

// Read vehicles from JSON file
$vehiclesJson = file_get_contents('vehicles/vehicles.json');
$vehiclesData = json_decode($vehiclesJson, true);

print_r($vehiclesJson);