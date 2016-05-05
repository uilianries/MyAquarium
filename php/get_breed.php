<?php
include_once("subject_db.php");
include_once("logger.php");
include_once("breed_db.php");

function main()
{
    $breed_name = $_GET['breed'];
    if ($breed_name == "") {
        die("ERROR: GET breed argument is empty");
    }

    $breed_db = new breed_db();
    $breed_array = $breed_db->get_config($breed_name);
    echo json_encode($breed_array);
}

main();