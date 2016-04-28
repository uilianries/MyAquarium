<?php
include_once("subject_db.php");
include_once("logger.php");

$sensor_name = $_GET['sensor'];
logger::information("Sensor is $sensor_name");
if ($sensor_name == '') {
    die("Sensor name is Empty");
}

$db = new subject_db($sensor_name);
echo json_encode($db->history());