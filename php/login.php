<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exile_chernarus_isles_x64";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "<br><h1>Error : Can't Connect To Database</h1><br>";
    die("Connection failed: " . $conn->connect_error);
} 

$queryNumbers = 0;
?>