<?php

$host = 'localhost';
$db_name = 'study';
$username = 'main';
$password = 'main';

// Create a new mysqli connection
$mysqli = new mysqli($host, $username, $password, $db_name);

// Check for connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
