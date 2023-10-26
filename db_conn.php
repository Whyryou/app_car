<?php

$sname= "student.crru.ac.th";
$unmae= "651513010";
$password = "16094";

$db_name = "651513010";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);


if (!$conn) {
	echo "Connection failed!";
}
?>