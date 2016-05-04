<?php
include_once("logger.php");

class subject_db {

    private $db_handle;

    function __construct($write=false) {
        logger::information("Connect on data base");
        $flag = SQLITE3_OPEN_READONLY;
        if ($write) {
            $flag = SQLITE3_OPEN_READWRITE;
        }
        $this->db_handle = new SQLite3('/var/www/html/db/SmartAquarium.sqlite', $flag);
        if (!$this->db_handle) {
          logger::error("Ops! Could not connect on data base");
        }
    }

    function __destruct() {
        $this->db_handle->close();
    }

    function insert($table, $level) {
        logger::information("Insert table: $table - level: $level");
        $this->db_handle->query("INSERT INTO $table (value) VALUES ($level)");
    }

    function select($table) {
        logger::information("Select table: $table");
        $query = $this->db_handle->query("SELECT * FROM $table ORDER BY id DESC LIMIT 1;");
        $row = $query->fetchArray();
        logger::information("Query result: ".implode($row));

        $array['timestamp'] = $row['timestamp'];
        $array['value'] = $row['value'];
        return $array;
    }

    function history($table) {
        logger::information("History table: $table");
        $query = $this->db_handle->query("SELECT * FROM $table;");
        
        $row = array();

        while ($res = $query->fetchArray(SQLITE3_ASSOC)) {
            logger::information($res['timestamp'].": ".$res['value']);
            $row[$res['timestamp']] = $res['value'];
        }

        return $row;
    }

}