<?php
include_once("subject_db.php");
include_once("logger.php");

logger::information("Setting fish config");
$value = $_GET['value'];
$db = new subject_db();
$db->insert("fish", $value);
echo 0;