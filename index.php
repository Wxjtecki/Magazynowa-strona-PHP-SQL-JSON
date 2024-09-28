<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("Location: home.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dworcowa Pub</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href= "dworcowapub.png" type="image/png">
</head>
<body style="margin: 50px;">
    <div class="container text-center">
        <h1 style="color: black;"><strong>Dworcowa Pub<strong></h1>
        <br>
        
       
        <form action="login.php" method="post">
            <h2><strong>Logowanie<strong></h2>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" placeholder="Login"><br>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" placeholder="Hasło"><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>