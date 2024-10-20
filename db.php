<?php
$servername = "localhost";
$username = "root";  // default username for WAMP
$password = "root";      // leave it blank for WAMP
$dbname = "student_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
