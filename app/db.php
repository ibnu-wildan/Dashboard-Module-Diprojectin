<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'db-nilai';

// Create connection
$conn = new mysqli($server, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    header("Location: ../views/404.php");
} 



?>

