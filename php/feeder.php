<?php
include_once("factory_actuator.php");
include_once("subject_db.php");

function main() {
    $actuator_name = "feeder";
    $local = false;

    $actuator = factory_actuator::create($actuator_name, $local);
    $actuator->on();
    sleep(1);
    $actuator->off();
    $actuator->update_db();
}

main();