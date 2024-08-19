<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamrocv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["mail"];
    $pass = $_POST["pass"];

    $sql = "Select * from register where email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        echo "Login successful!";
        header("Location: dashboard.html");
        exit;
    } else {
        echo "Invalid email or password!";
    }
    
}
