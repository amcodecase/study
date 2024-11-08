<?php

$host = 'localhost';
$db_name = 'study';
$username = 'main';
$password = 'main';

// Create a new mysqli connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
