<?php
require("phpMQTT.php");
include_once("logger.php");

class host_config {
  public $url;
  public $port;

  function __construct($url = "localhost", $port = 1883) {
    $this->url = $url;
    $this->port = $port;
  }
}

class user_config {
  public $username;
  public $password;

  function __construct($username = "", $password = "") {
    $this->username = $username;
    $this->password = $password;
  }
}

class mqtt_sensor {

    private $topic_functions;
    private $mqtt_handle;
    private $answer;

    function __construct($host_config, $user_config = null) {
        logger::information("Create MQTT - broker: $host_config->url:$host_config->port");
        $this->mqtt_handle = new phpMQTT($host_config->url, $host_config->port, "MQTTSensor".rand()); 
    
        if (!$user_config) {
            $user_config = new user_config();
        }
        logger::information("Connect MQTT - username: $user_config->username - password: $user_config->password");
        if (!$this->mqtt_handle->connect_auto(true, NULL, $user_config->username, $user_config->password)) {
            exit(1);
        }

        $this->topic_functions = array();
        $this->answer = array();
    }
    
    function __destruct() {
        $this->mqtt_handle->close();
    }
    
    function run() {
        while($this->mqtt_handle->proc());
    }

    function subscribe($topic, $callback) {
        $this->topic_functions[$topic] = $callback;
        $values[$topic] = array("qos"=>1, "function"=>function($topic, $payload) {
            logger::information("MQTT Client - On arrive: topic: $topic - payload: $payload");
            $result = $this->topic_functions[$topic];
            if ($result != null) {
                $result($topic, $payload);
            }
        });

        $this->mqtt_handle->subscribe($values, 0);
    }

    function publish($topic, $payload, $qos = 0, $retain = 0) {
        $this->mqtt_handle->publish($topic, $payload, $qos, $retain);
    }

  
}
