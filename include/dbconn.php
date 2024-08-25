<?php
// Database credentials
$host = 'localhost';    // Database host (usually localhost)
$dbname = 'ngo'; // Name of your database
$username = 'root';    // Database username
$password = '';    // Database password

// Create a new mysqli connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, set the character set to utf8
$conn->set_charset("utf8");

?>
