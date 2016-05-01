<?php
require("actuator.php");

class factory_actuator {

    static function create($name, $local=false) {
        $host_config = new host_config('m11.cloudmqtt.com', 15347);
        $user_config = new user_config($name.'_actuator', $name.'actuator');
        $topic = 'smartaquarium/actuator/'.$name.'/level';
        $table = $name;

        if ($local) {
            $host_config = new host_config();
            $user_config = new user_config();
        }

        $sensor_config = new actuator_config($host_config, $user_config, $topic, $table);
        $sensor = new actuator($sensor_config);

        return $sensor;
    }
}
