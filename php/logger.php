<?php

/**
 * Created by PhpStorm.
 * User: uilian
 * Date: 4/27/16
 * Time: 9:52 PM
 */
class logger
{
    static private function publish($level, $message) {
        error_log(date("r"). ": $level - ".$message."\n", 3 , "/var/tmp/php-errors.log");
    }
    
    static function information($message) {
        logger::publish("INFO", $message);
    }

    static function error($message) {
        logger::publish("ERROR", $message);
    }
}