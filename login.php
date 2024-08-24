<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamrocv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["mail"];
    $pass = $_POST["pass"];

    // Query to check if the user exists
    $sql = "SELECT * FROM register WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);

    // If a matching user is found
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['fullName'] = $row['fullName']; // Set the session with the user's full name
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>
            alert('Incorrect email or password. Please try again.');
            setTimeout(function(){
                window.location.href = 'login.html';
            }, 1000);
        </script>";
    }
}
?>
