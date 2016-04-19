<?php

$server = "localhost";
$username = "root";
$password = "password";
$database = "lightstats";
$table = "lighttime";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
	echo "An error has occurred:\n" . $conn->connect_error;
}

$sql = "SELECT timeon, timeoff FROM {$table}";

$result = $conn->query($sql);

$timeon = array();
$timeoff = array();
$timediff = array();

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		// Access data with $row['timeon']
		array_push($timeon, $row['timeon']);
		array_push($timeoff, $row['timeoff']);
		array_push($timediff, strtotime($row['timeoff']) - strtotime($row['timeon']));
	}
} else {
	// JSON error
	die("An error has occurred");
}

$conn->close();
// JSON construction
//count($timeoff);

$json = "{\"times\": [";

for ($i = 0; $i < count($timeoff); $i++) {
	if ($i != count($timeoff) - 1) {
		$json .= "{\"timeon\":\"{$timeon[$i]}\", \"timeoff\":\"{$timeoff[$i]}\", \"timediff\":\"{$timediff[$i]}\"},";
	} else {
		$json .= "{\"timeon\":\"{$timeon[$i]}\", \"timeoff\":\"{$timeoff[$i]}\", \"timediff\":\"{$timediff[$i]}\"}";
	}
}

$json .= "]}";

echo $json;

$handle = fopen("datatxt.txt", 'w');
fwrite($handle, $json);

fclose($handle);
