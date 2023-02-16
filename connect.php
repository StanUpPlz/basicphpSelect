<?php
$servername = "192.168.67.58";
$username = "student";
$password = "stu2022";
$dbname = "backoffice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
