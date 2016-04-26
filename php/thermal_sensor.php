<?php
//publish.php
require("phpMQTT.php");

$host = "m11.cloudmqtt.com"; 
$port = 15347;
$username = "thermal_sensor"; 
$password = "thermalsensor"; 

//MQTT client id to use for the device. "" will generate a client id automatically
$mqtt = new phpMQTT($host, $port, "ThermalSensor".rand()); 

if (!$mqtt->connect(true,NULL,$username,$password)) {
  exit(1);
}

$topic['smartaquarium/sensor/temperature/level'] = array("qos"=>1, "function"=>"on_arrive");
$mqtt->subscribe($topic, 0);

while($mqtt->proc()) {}

$mqtt->close();

function on_arrive($topic, $payload) {
  echo "On Arrive ".date("r")." topic: $topic - payload: $payload\n";
}

?>
