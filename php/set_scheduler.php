<?php
include_once("subject_db.php");
include_once("logger.php");
include_once("mqtt_sensor.php");
include_once("breed_db.php");

function update_sched_db($timestamp, $value)
{
    logger::information("Setting fish config to: $timestamp - $value");
    $db = new subject_db(true);
    $db->insert_b("scheduler", $timestamp, $value);
}

function update_sched_mqtt($timestamp, $value)
{
    $host_config = new host_config('m11.cloudmqtt.com', 15347);
    $user_config = new user_config('feeder_scheduler', 'feederscheduler');

    $mqtt_sensor = new mqtt_sensor($host_config, $user_config);

    $scheduler = [
        'hour' => $timestamp,
        'interval' => $value
    ];

    $scheduler_encoded = json_encode($scheduler);

    logger::information("Scheduler config: $scheduler_encoded");

    $mqtt_sensor->publish('smartaquarium/actuator/feeder/config', $scheduler_encoded, 1, 1);
}

function main()
{
    $value = $_GET['value'];
    $timestamp = $_GET['timestamp'];
    update_sched_db($timestamp, $value);
    update_sched_mqtt($timestamp, $value);

    return 0;
}

echo main();