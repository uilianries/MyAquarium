<?php
include_once("mqtt_sensor.php");

function main() {
    $host_config = new host_config('m11.cloudmqtt.com', 15347);
    $user_config = new user_config('feeder_actuator','feederactuator');

    $mqtt_sensor = new mqtt_sensor($host_config, $user_config);
    $mqtt_sensor->publish('smartaquarium/actuator/feeder/command', 'on', 1, 0);
    
    return 0;
}

echo main();