
<?php
$servername = "localhost";
$username = "willia55_db";
$password = "r;7IjRSCukFm";
$DBname = "willia55_tutoring";
// Create connection
$conn = new mysqli($servername, $username, $password,$DBname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

