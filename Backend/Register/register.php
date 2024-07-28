<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "hamrocv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];

    // Check if password and cpassword match
    if ($pass != $cpass) {
        die("Passwords do not match. Please try again.");
    }

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO register (fullName, email, password, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $fullName, $email, $hashed_password);

    // Execute and check for success
    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

$conn->close();

