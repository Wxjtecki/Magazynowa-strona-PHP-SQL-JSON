<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$category = $_GET['category'];

if ($category === 'piwo' || $category === 'napoje' || $category === 'wodka') {
    $sql = "SELECT * FROM $category";
} else {
    die("Invalid category.");
}

$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$connection->close();
?>
