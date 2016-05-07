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
        $today = localtime();
        $year = $today[5] + 1900;
        $month = $today[4] + 1;
        $day = $today[3];
        $prefix = "$year-$month-$day";
        error_log(date("r"). ": $level - ".$message."\n", 3 , "/var/tmp/$prefix-php-errors.log");
    }
    
    static function information($message) {
        logger::publish("INFO", $message);
    }

    static function error($message) {
        logger::publish("ERROR", $message);
    }
}