<?php
$server = "localhost";
$username = "root";
$password = "password";
$database = "lightstats";

$sql = "SELECT * FROM lightnotify";
$conn = mysqli_connect($server, $username, $password, $database);

$result = $conn->query($sql);
$notify = FALSE;

// Inserted Database Type is of Small-Int
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		if ($row["NOTIFY"] == 1) $notify = TRUE;
	}
} else {
	$notify = FALSE;
}
$out = $notify ? '1' : '0';

$json = "{\"lightnotify\":" . "\"{$out}\"}";
echo $json;

$conn->close();
