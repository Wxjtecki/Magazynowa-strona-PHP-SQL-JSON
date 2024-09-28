<?php
$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql = "SELECT * FROM kalendarz_pracowniczy";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 50px;
            background-image: url('dworcowapubUWU.png');
            background-size: cover; 
            background-repeat: no-repeat;
            color: white; 
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center" style="color: black;"><strong>Kalendarz Pracowniczy<strong></h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Dzień</th>
                    <th>Kamil</th>
                    <th>Kornelia</th>
                    <th>Ola</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['dzien'] . "</td>";
                    echo "<td>" . $row['obecnosc_pracownik1'] . "</td>";
                    echo "<td>" . $row['obecnosc_pracownik2'] . "</td>";
                    echo "<td>" . $row['obecnosc_pracownik3'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center mt-3">
            <a href="home.php" class="btn btn-primary">Powrót do strony głównej</a>
        </div>
    </div>
</body>
</html>

<?php
$connection->close();
?>
