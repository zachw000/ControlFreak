<?php
$server = "localhost";
$username = "root";
$password = "password";
$database = "lightstats";
$table = "lighttime";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
}

$time = time();

$sql = "UPDATE {$table} SET timeoff=NOW(), timeon=timeon WHERE timeoff IS NULL";

if ($conn->query($sql) === TRUE) {
	echo "Record Updated Successfully";
} else {
	echo "An error has occurred: " . $conn->error;
}

$conn->close();
