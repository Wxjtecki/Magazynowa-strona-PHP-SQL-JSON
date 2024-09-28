<?php

$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Connection failed!";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['nazwa']) && isset($_POST['dlug']) && isset($_POST['data'])) {
        
        $nazwa = $_POST['nazwa'];
        $dlug = $_POST['dlug'];
        $data = $_POST['data'];

        
        $sql = "INSERT INTO kreska (nazwa, dlug, data) VALUES ('$nazwa', '$dlug', '$data')";

        if ($conn->query($sql) === TRUE) {
            echo "Dodano klienta pomyślnie";
        } else {
            echo "Błąd: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Nie przesłano wszystkich wymaganych danych";
    }
}
?>
