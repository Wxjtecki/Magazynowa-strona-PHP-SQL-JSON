<?php
$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'];
$category = $_GET['category']; 

$sql = "UPDATE $category SET ilosc = ilosc - 1 WHERE id = $id"; 
if ($connection->query($sql) === TRUE) {
    
    echo json_encode(["success" => true]);
} else {
    
    echo json_encode(["success" => false, "error" => "Error updating record: " . $connection->error]);
}

$connection->close();
?>
