<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 
$servername = "mysql8";
$username = "01061926_dworcowapub";
$password = "dworcowa035!";
$dbname = "01061926_dworcowapub";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	echo "Connection failed!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (isset($_POST['username']) && isset($_POST['password'])) {

        
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        
        $sql = "SELECT * FROM log WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
            exit();
        }

        
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];

            
            echo '<script>window.location.href = "home.php";</script>';
            exit(); 
        } else {
            
            header("Location: index.php?error=Incorrect User name or password");
            exit();
        }
    }
}
?>
