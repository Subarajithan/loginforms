<?php
session_start();


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ATIWEB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["email"];
    $password = $_POST["password"];

   
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    


    $sql = "SELECT * FROM lecturer WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        
		 $row = $result->fetch_assoc();
        $_SESSION["loggedin"] = true;
        $_SESSION["lecturer_email"] = $row["Email"];
		
        $_SESSION["loggedin"] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        
        header("Location: login.php?error=1");
        exit();
    }
}


$conn->close();
?> 