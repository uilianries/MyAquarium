<?php
include_once("subject_db.php");
include_once("logger.php");
include_once("mqtt_sensor.php");

function update_fish_db($value)
{
    logger::information("Setting fish config to: $value");
    $db = new subject_db(true);
    $db->insert("fish", $value);
}

function update_fish_mqtt($value)
{
    $host_config = new host_config('m11.cloudmqtt.com', 15347);
    $user_config = new user_config('fish_config','fishconfig');

    $mqtt_sensor = new mqtt_sensor($host_config, $user_config);
    $mqtt_sensor->publish('smartaquarium/config/breed', $value, 1, 1);
}

function main()
{
    $value = $_GET['value'];
    update_fish_db($value);
    update_fish_mqtt($value);

    return 0;
}

echo main();