<?php
include_once("factory_sensor.php");

$sensor_name = "ph";
$local = true;

$sensor = factory_sensor::create($sensor_name, $local);
$sensor->listen();
