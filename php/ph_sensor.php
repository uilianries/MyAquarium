<?php
include_once("factory_sensor.php");

$sensor_name = "ph";
$local = false;

$sensor = factory_sensor::create($sensor_name, $local);
$sensor->listen();
