<?php

$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";
$connection = new mysqli($servername, $username, $password, $dbname);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


if(isset($_GET['id'])) {
    
    $id = $_GET['id'];

    
    $sql = "DELETE FROM kreska WHERE id=$id";

    
    if ($connection->query($sql) === TRUE) {
        echo "Klient został usunięty pomyślnie.";
    } else {
        echo "Błąd podczas usuwania klienta: " . $connection->error;
    }
} else {
    echo "Brak przesłanego identyfikatora klienta.";
}


$connection->close();
?>
