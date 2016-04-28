<?php
require("phpMQTT.php");

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
    $this->mqtt_handle = new phpMQTT($host_config->url, $host_config->port, "MQTTSensor".rand()); 
    
        if (!$user_config) {
            $user_config = new user_config();
        }
        if (!$this->mqtt_handle->connect(true, NULL, $user_config->username, $user_config->password)) {
            exit(1);
        }

        $this->topic_functions = array();
        $this->answer = array();
    }
    
    function __destruct() {
        $this->mqtt_handle->close();
    }
    
    function run() {
      
    while($this->mqtt_handle->proc()) {}
    }

    function subscribe($topic, $callback) {
        $this->topic_functions[$topic] = $callback;
        $values[$topic] = array("qos"=>1, "function"=>function($topic, $payload) {
            $result = $this->topic_functions[$topic];
            if ($result != null) {
                $result($payload);
            }
        });

        $this->mqtt_handle->subscribe($values, 0);
    }

  
}
