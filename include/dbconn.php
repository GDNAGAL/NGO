<?php
// Database credentials
$host = '154.41.233.103';  
$dbname = 'u664437076_ngo'; 
$username = 'u664437076_ngo';   
$password = 'Tt8]H;eOx56';  

$ftp_server = "154.41.233.125";
$ftp_username = "u664437076.DevJRDFoundation";
$ftp_password = "o8wZzjVSlVM6d2c";
$ftpPath = "https://jrdfoundation.com/DevDocuments/";

// Create a new mysqli connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, set the character set to utf8
$conn->set_charset("utf8");

?>
