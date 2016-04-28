<?php
/**
 * Created by PhpStorm.
 * User: uilian
 * Date: 4/27/16
 * Time: 12:29 AM
 */
include_once("subject_db.php");
include_once("mqtt_sensor.php");
include_once("logger.php");

class sensor_config {
    public $host_config;
    public $user_config;
    public $topic;
    public $table;

    function __construct($host_config, $user_config, $topic, $table)
    {
        $this->host_config = $host_config;
        $this->user_config = $user_config;
        $this->topic = $topic;
        $this->table = $table;
    }
}

class sensor {
    private $mqtt_handler;
    private $db_handler;
    private $topic;

    function __construct($sensor_config) {
        $this->mqtt_handler = new mqtt_sensor($sensor_config->host_config, $sensor_config->user_config);
        $this->db_handler = new subject_db($sensor_config->table);
        $this->topic = $sensor_config->topic;
        logger::information("Subscribe - sensor: $sensor_config->table - topic: $sensor_config->topic");
        $this->mqtt_handler->subscribe($sensor_config->topic, function ($payload) {
            logger::information("On Arrive - topic: $this->topic - payload: $payload");
            $this->db_handler->insert($payload);
        });
    }

    function listen() {
        $this->mqtt_handler->run();
    }
}
