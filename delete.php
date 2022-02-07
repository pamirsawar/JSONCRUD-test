<?php

if (isset($_REQUEST['action']) && isset($_REQUEST['id'])) {

    $file = './jsons/' . $_REQUEST['id'] . ".json";

    if (file_exists($file)) {
        if (!unlink($file)) {
            echo "Error";
        } else {
            header("location: ./index.php");
        }
    } else {

        header("location: ./index.php");
    }
}
