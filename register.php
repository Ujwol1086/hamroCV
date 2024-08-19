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
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $cpass = $_POST["cpass"];

    $sql = "INSERT INTO register (fullname, email, pass) VALUES ('$fullname', '$email', '$pass')";
    if (mysqli_query($conn, $sql)) {
        header("location: ../Login/login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
