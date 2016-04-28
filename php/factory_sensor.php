<?php
require("sensor.php");

class factory_sensor {

  static function create($name, $local=false) {
    $host_config = new host_config('m11.cloudmqtt.com', 15347);
    $user_config = new user_config($name.'_sensor', $name.'sensor');
    $topic = 'smartaquarium/sensor/'.$name.'/level';
    $table = $name;

    if ($local) {
        $host_config = new host_config();
        $user_config = new user_config();
    }

    $sensor_config = new sensor_config($host_config, $user_config, $topic, $table);
    $sensor = new sensor($sensor_config);

    return $sensor;
  }
}
