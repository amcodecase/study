<?php

$host = 'localhost';
$db_name = 'u178619125_study';
$username = 'mau178619125_studyin';
$password = '@Study01';

// Create a new mysqli connection
$mysqli = new mysqli($host, $username, $password, $db_name);

// Check for connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
