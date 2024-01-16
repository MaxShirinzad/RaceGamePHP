<?php

require 'vendor/autoload.php';

use App\Models\Play;

$singleton = Play::getInstance();
$singleton->play();

