<?php
include_once("subject_db.php");
include_once("logger.php");

logger::information("Request fish config");
$db = new subject_db();
echo json_encode($db->select("fish"));
