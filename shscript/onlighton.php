<?php
$server = "localhost";
$username = "root";
$password = "password";
$database = "lightstats";

$table = "lighttime";

// Get Server Time On
$timeon = time();

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
	die("Error Connecting: " . $conn->connect_error);
}

// ID should auto update, and I will use the NULL value in
// lightoff to determine the total amount of time on
$sql = "INSERT INTO {$table} (timeon) VALUES (NOW())";

if ($conn->query($sql) === TRUE) {
	echo "Data Recorded Successfully";
} else {
	echo "An error has occurred.";
}
