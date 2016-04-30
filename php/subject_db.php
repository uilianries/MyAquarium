<?php
include_once("logger.php");

class subject_db {

    private $db_handle;
    private $sensor_name;

    function __construct($sensor_name) {
        $this->sensor_name = $sensor_name;
        logger::information("Connect on data base: sensor $sensor_name");
        $this->db_handle = new SQLite3('/var/www/html/db/SmartAquarium.sqlite', SQLITE3_OPEN_READWRITE);
        if (!$this->db_handle) {
          logger::error("Ops! Could not connect on data base");
        }
    }

    function __destruct() {
        $this->db_handle->close();
    }

    function insert($level) {
        logger::information("Insert table: $this->sensor_name - level: $level");
        $this->db_handle->query("INSERT INTO $this->sensor_name (value) VALUES ($level)");
    }

    function select() {
        logger::information("Select table: $this->sensor_name");
        $query = $this->db_handle->query("SELECT * FROM $this->sensor_name ORDER BY id DESC LIMIT 1;");
        $row = $query->fetchArray();
        logger::information("Query result: ".implode($row));

        $array['timestamp'] = $row['timestamp'];
        $array['value'] = $row['value'];
        return $array;
    }

    function history() {
        logger::information("History table: $this->sensor_name");
        $query = $this->db_handle->query("SELECT * FROM $this->sensor_name;");
        
        $row = array();

        while ($res = $query->fetchArray(SQLITE3_ASSOC)) {
            logger::information($res['timestamp'].": ".$res['value']);
            $row[$res['timestamp']] = $res['value'];
        }

        return $row;
    }

}