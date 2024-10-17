<?php

function connectDb($db_name, $db_user, $db_password = "") {
    $connection = new mysqli("localhost", $db_user, $db_password, $db_name);
    
    if ($connection -> connect_error) {
        die("Connection failed: " . $connection -> connect_error);
    }
    
    return $connection;
}
