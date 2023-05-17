<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$db_name    = "lasma_test_db";

$CONN = new mysqli($servername, $username, $password, $db_name);

if ($CONN->connect_error) {
    die("Connection failed: " . $CONN->connect_error);
}

?>
