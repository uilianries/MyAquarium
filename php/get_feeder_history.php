<?php
include_once("subject_db.php");
include_once("logger.php");

logger::information("Actuator is feeder");

$db = new subject_db($sensor_name);
echo json_encode($db->history());