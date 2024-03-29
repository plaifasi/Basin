<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "basin";

// Create a MySQLi connection
$con = new mysqli($server, $username, $password, $database);

// Check for connection errors
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
