<?php
$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	echo "Connection failed!";
}