<?php
function dismiss() {
	$servername = "localhost";
	$username = "root";
	$password = "j720b@RJb";
	$database = "lightstats";

	$conn = new mysqli($servername, $username, $password, $database);

	$sql = "UPDATE lightnotify SET `NOTIFY`=0 WHERE `NOTIFY`=1";

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if ($conn->query($sql) === TRUE) {
		//echo "Record updated";
	} else {
		echo "Error Updating Record: " . $conn->error;
	}

	$conn->close();
}
