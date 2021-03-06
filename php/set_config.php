<?php
include_once("subject_db.php");
include_once("logger.php");
include_once("mqtt_sensor.php");
include_once("breed_db.php");

function update_fish_db($value)
{
    logger::information("Setting fish config to: $value");
    $db = new subject_db(true);
    $db->insert("fish", $value, 'string');
}

function update_fish_mqtt($value)
{
    $host_config = new host_config('m11.cloudmqtt.com', 15347);
    $user_config = new user_config('fish_config','fishconfig');

    $mqtt_sensor = new mqtt_sensor($host_config, $user_config);

    $breed_db = new breed_db();
    $breed_array = $breed_db->get_config($value);

    $heater_config = [
        "min" => $breed_array["min_temperature"],
        "max" => $breed_array["max_temperature"],
    ];

    $lighting_config = [
        "min" => $breed_array["min_light"],
        "max" => $breed_array["max_light"],
    ];

    $heater_encoded = json_encode($heater_config);
    $lighting_encoded = json_encode($lighting_config);

    logger::information("Heater config: $heater_encoded");
    logger::information("Lighting config: $lighting_encoded");


    $mqtt_sensor->publish('smartaquarium/actuator/heater/config', $heater_encoded, 1, 1);
    $mqtt_sensor->publish('smartaquarium/actuator/lighting/config', $lighting_encoded, 1, 1);
}

function main()
{
    $value = $_GET['value'];
    update_fish_db($value);
    update_fish_mqtt($value);

    return 0;
}

echo main();