<?php

  session_start();

// Check if the user is logged in
if (isset($_SESSION['fullName'])) {
    $userName = $_SESSION['fullName'];
} else {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamrocv";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from form fields
    $first_name = $_POST["fname"];
    $middle_name = $_POST["mname"]; // Optional field
    $last_name = $_POST["lname"];
    $gender = $_POST["gender"];
    $birth_date = $_POST["dob"];
    $marital_status = $_POST["mstatus"];
    $profession = $_POST["profession"];
    $street_address = $_POST["saddr"];
    $city = $_POST["city"];
    $state_province = $_POST["state-province"];
    $nationality = $_POST["nationality"];
    $passport_number = $_POST["passport"]; // Optional field
    $phone_number = $_POST["phnumber"];
    $email = $_POST["email"];

    // SQL query to insert form data into the newResume table
    $sql = "INSERT INTO newResume (
                first_name, middle_name, last_name, gender, birth_date, marital_status, 
                profession, street_address, city, state_province, nationality, 
                passport_number, phone_number, email
            ) VALUES (
                '$first_name', '$middle_name', '$last_name', '$gender', '$birth_date', '$marital_status', 
                '$profession', '$street_address', '$city', '$state_province', '$nationality', 
                '$passport_number', '$phone_number', '$email'
            )";

    // Execute the query and check if successful
    if (mysqli_query($conn, $sql)) {
        header("Location: experience.html"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
