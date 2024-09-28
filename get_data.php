<?php
$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$category = $_GET['category'];

if ($category === 'kreska') {
    $sql = "SELECT nazwa, dlug, data, id FROM kreska"; 
} else {
    $sql = "SELECT * FROM $category";
}

$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

echo "<table class='table'>
        <thead>
            <tr>";

if ($category === 'kreska') {
    echo "<th>Nazwa</th>
          <th>Dług</th>
          <th>Data</th>";
} else {
    echo "<th>Nazwa</th>
          <th>Ilość</th>
          <th>Cena_bar</th>
          <th>cena_det</th>";
}

echo "<th>Akcje</th>
      </tr>
      </thead>
      <tbody>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";

    if ($category === 'kreska') {
        echo "<td>" . $row["nazwa"] . "</td>
              <td>" . $row["dlug"] . "</td>
              <td>" . $row["data"] . "</td>";
    } else {
        echo "<td>" . $row["nazwa"] . "</td>
              <td>" . $row["ilosc"] . "</td>
              <td>" . $row["cena_bar"] . "</td>
              <td>" . $row["cena_det"] . "</td>";
    }

    echo "<td>";

    if ($category === 'kreska') {
        echo "<button class='btn btn-primary btn-sm' onclick='edit(" . $row["id"] . ")'>edytuj</button>
              <button class='btn btn-danger btn-sm' onclick='remove(" . $row["id"] . ")'>usuń</button>";
    } else {
        echo "<button class='btn btn-primary btn-sm' onclick='subtractOne(" . $row["id"] . ", \"" . $category . "\")'>-</button>
              <button class='btn btn-primary btn-sm' onclick='addOne(" . $row["id"] . ", \"" . $category . "\")'>+</button>";
    }

    echo "</td>
          </tr>";
}

echo "</tbody></table>";

$connection->close();
?>
