
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dworcowa Pub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="dworcowapub.png" type="image/png">
    <style>
      body {
            margin: 50px;
            background-image: url('dworcowapubUWU.png');
            background-size: cover; 
            background-repeat: no-repeat;
            color: white; 
        }
        .btn-container {
            display: flex; 
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .btn-container .btn {
            margin: 0 5px;
        }

        .login-form {
            display: block; 
        }
    </style>
</head>
<body style="margin: 50px;">
<div class="container text-center">
        <h1 style="color: black;"><strong>Dworcowa Pub<strong></h1>
        <br>
        <p style="color: black;"><strong>Cześć, <?php echo $sessionName; ?>!<strong></p>
        <div id="loggedInButtons" class="btn-container">
            <button class="btn btn-primary mx-2" onclick="showData('piwo')">Piwo</button>
            <button class="btn btn-primary mx-2" onclick="showData('napoje')">Napoje</button>
            <button class="btn btn-primary mx-2" onclick="showData('wodka')">Wódka</button>
            <button class="btn btn-primary mx-2" onclick="window.location.href = 'dostawa.php'">Dostawa</button>
            <button class="btn btn-primary mx-2" onclick="showData('kreska')">Klient/Kreska</button>
            <button id="addClientBtn" class="btn btn-success mx-2" onclick="addClient()">Dodaj klienta</button>
            <button class="btn btn-info mx-2" onclick="openCalendar()">Kalendarz</button>
            <a href="logout.php" class="btn btn-danger mx-2">Wyloguj</a>
       </div>
 
        <br><br>
        <div id="table-body">
        </div>
    </div>
    
    <script>
        function showData(category) {
            fetch('get_data.php?category=' + category)
            .then(response => response.text())
            .then(data => {
                document.getElementById('table-body').innerHTML = data;
            });
        }

        function addClient() {
            var form = `
                <div class="container">
                    <h2 style="color: black;"><strong>Dodaj Klienta na kreske<strong></h2>
                    <form id="addClientForm" onsubmit="return submitClientForm()">
                        <div class="mb-3">
                            <label style="color: black;" for="nazwa" class="form-label">Nazwa:</label>
                            <input style="color: black;" type="text" class="form-control" id="nazwa" name="nazwa">
                        </div>
                        <div class="mb-3">
                            <label style="color: black;" for="dlug" class="form-label">Dług:</label>
                            <input style="color: black;" type="text" class="form-control" id="dlug" name="dlug">
                        </div>
                        <div class="mb-3">
                            <label style="color: black;" for="data" class="form-label">Data:</label>
                            <input type="date" class="form-control" id="data" name="data">
                        </div>
                        <button type="submit" class="btn btn-primary">Dodaj klienta</button>
                    </form>
                </div>
            `;
            document.getElementById('table-body').innerHTML = form;
        }

        
        function submitClientForm() {
            
            var nazwa = document.getElementById('nazwa').value;
            var dlug = document.getElementById('dlug').value;
            var data = document.getElementById('data').value;

            fetch('dodaj.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'nazwa=' + encodeURIComponent(nazwa) + '&dlug=' + encodeURIComponent(dlug) + '&data=' + encodeURIComponent(data),
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            })
            .catch(error => {
                console.error('Błąd:', error);
            });
            return false;
        }
        
          function subtractOne(id, category) {
        fetch('subtract_one.php?id=' + id + '&category=' + category, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showData(category);
            } else {
                console.error("Error updating record:", data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function edit(id) {
            window.location.href = 'edytuj.php?id=' + id;
        }

function remove(id, category) {
    if (confirm("Czy na pewno chcesz usunąć ten rekord?")) {
        fetch('usun.php?id=' + id + '&category=' + category, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload(); 
        })
        .catch(error => {
            console.error('Błąd:', error);
        });
    }
}

    function addOne(id, category) { 
        fetch('add_one.php?id=' + id + '&category=' + category, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showData(category);
            } else {
                console.error("Error updating record:", data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    function openCalendar() {
    window.location.href = 'kalendarz.php'; 
}
    </script>
</body>
</html>

