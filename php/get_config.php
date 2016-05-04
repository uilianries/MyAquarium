<?php
include_once("subject_db.php");
include_once("logger.php");

$db = new subject_db();
$fish = $db->select("fish");
$billboard = $db->select("billboard");

$array = [ "fish_banner" => $fish
            "billboard" => $billboard];

logger::information("Current config is banner: $fish - billboard: $billboard");

echo json_encode($array);