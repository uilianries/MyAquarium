<?php
//publish.php
require("phpMQTT.php");

$host = "m11.cloudmqtt.com"; 
$port = 15347;
$username = "light_sensor"; 
$password = "lightsensor"; 

//MQTT client id to use for the device. "" will generate a client id automatically
$mqtt = new phpMQTT($host, $port, "LightSensor".rand()); 

if (!$mqtt->connect(true,NULL,$username,$password)) {
  exit(1);
}

$db = new SQLite3('../db/SmartAquarium.db', SQLITE3_OPEN_READWRITE);
if (!$db) {
  die($sqliteerror);
}

$topic['smartaquarium/sensor/light/level'] = array("qos"=>1, "function"=>"on_arrive");
$mqtt->subscribe($topic, 0);

while($mqtt->proc()) {}

$mqtt->close();

function on_arrive($topic, $payload) {
  echo "On Arrive ".date("r")." topic: $topic - payload: $payload\n";
  global $db;
  $db->query("INSERT INTO light (value) VALUES ($payload)");
}

?>
