<?php

$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";
$connection = new mysqli($servername, $username, $password, $dbname);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


if (!isset($_GET['id'])) {
    die("Brak identyfikatora klienta.");
}

$id = $_GET['id'];


$sql = "SELECT * FROM kreska WHERE id = $id";
$result = $connection->query($sql);


if ($result->num_rows == 0) {
    die("Nie znaleziono klienta o podanym identyfikatorze.");
}


$row = $result->fetch_assoc();
$nazwa = $row['nazwa'];
$dlug = $row['dlug'];
$data = $row['data'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj klienta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">
    <h1 class="mt-5">Edytuj klienta</h1>
    <form action="zapisz_edycje.php" method="POST" id="editForm">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
            <label for="nazwa" class="form-label">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?php echo $nazwa; ?>">
        </div>
        <div class="mb-3">
            <label for="dlug" class="form-label">Dług:</label>
            <input type="text" class="form-control" id="dlug" name="dlug" value="<?php echo $dlug; ?>">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" class="form-control" id="data" name="data" value="<?php echo $data; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>

    <script>
        
        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault(); 

            
            fetch('zapisz_edycje.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(new FormData(this)) 
            })
            .then(response => {
                if (response.ok) {
                    
                    window.location.href = 'home.php';
                } else {
                    
                    alert('Wystąpił błąd podczas zapisywania zmian.');
                }
            })
            .catch(error => {
                console.error('Błąd:', error);
                alert('Wystąpił błąd podczas zapisywania zmian.');
            });
        });
    </script>
</body>
</html>


