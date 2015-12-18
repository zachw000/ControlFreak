<?php
$con = mysqli_connect("localhost", "root", "j720b@RJb", "lightstats");
$sql = "UPDATE lightnotify SET `NOTIFY`=1 WHERE `NOTIFY`=0";

if ($con->query($sql) === TRUE) {
	echo "Record Updated";
} else {
	echo "An error has occurred." . $con->error;
}

$con->close();
