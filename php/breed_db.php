<?php

/**
 * Created by PhpStorm.
 * User: uilian
 * Date: 5/4/16
 * Time: 9:45 PM
 */
class breed_db
{
    private $db_handle;
    
    function __construct()
    {
        $this->db_handle = new SQLite3('/var/www/html/db/SmartAquarium.sqlite', SQLITE3_OPEN_READONLY);
        if (!$this->db_handle) {
            die('ERROR: Could not open data base');
        }
    }
    
    function __destruct()
    {
        $this->db_handle->close();
    }
    
    function get_config($breed_name)
    {
        if ($breed_name == "") {
            die ("ERROR: breed name could not be empty");
        }

        $query = $this->db_handle->query("SELECT * FROM config WHERE breed=\"$breed_name\";");
        if (!$query) {
            die("ERROR: Could not query data $breed_name on config table");
        }
        
        return $query->fetchArray();  
    }
}