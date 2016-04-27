<?php
$conn = mysqli_connect("localhost", "root", "password", "lightstats");

if ($conn->connect_error) {
	echo "Connection Failed: " . $conn->connect_error;
}

$sql = "UPDATE lightnotify SET `NOTIFY`=0 WHERE `NOTIFY`=1";

if ($conn->query($sql)) {
	echo "Record Updated";
} else {
	echo "Error Updating Record" . $conn->error;
}

$conn->close();
