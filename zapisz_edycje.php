<?php

$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";
$connection = new mysqli($servername, $username, $password, $dbname);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $nazwa = $_POST['nazwa'];
    $dlug = $_POST['dlug'];
    $data = $_POST['data'];

    
    $sql = "UPDATE kreska SET nazwa='$nazwa', dlug='$dlug', data='$data' WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo "Dane klienta zostały zaktualizowane pomyślnie.";
    } else {
        echo "Błąd podczas aktualizacji danych klienta: " . $connection->error;
    }
} else {
    echo "Brak danych przesłanych metodą POST.";
}


$connection->close();
?>
