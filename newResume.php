<!-- Profile -->
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
        header("Location: experience.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="newResume.css  " />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <title>My Resume</title>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="nav-content">
          <h1>hamroCV</h1>
          <div class="hamburger-menu">
            <img
              src="./Images/Dashboard-Image/Assets/bergetr-menu2.png"
              alt=""
            />
          </div>
          <div class="input">
            <input type="text" placeholder="Search" />
            <img src="./Images/Dashboard-Image/Assets/search.png" alt="" />
          </div>
          <div class="notification-icon">
            <img
              src="./Images/Dashboard-Image/Assets/notification.png"
              alt=""
            />
          </div>
        </div>
        <div class="profile">
          <img src="./Images/Dashboard-Image/Assets/Profile_image.png" alt="" />
          <h3><?php echo $userName; ?></h3>
          <a href="logout.php" class="logout-button">Logout</a>
        </div>
      </nav>
    </header>
    <section class="dashboard">
      <aside>
        <div class="sidebar">
          <ul>
            <li>
              <a href="../hamroCV/dashboard.php">
                <img
                  src="./Images/Dashboard-Image/Assets/Profile_image2.png"
                  alt=""
                />
                <span><?php echo $userName; ?></span>
              </a>
            </li>
            <li>
              <a href="../hamroCV/dashboard.php">
                <img
                  src="./Images/Dashboard-Image/Assets/bergetr-menu1.png"
                  alt=""
                />
                <span>Dashboard</span></a
              >
            </li>
            <li>
              <a href="../hamroCV/myResume.php">
                <img
                  src="./Images/Dashboard-Image/Assets/resume_active.png"
                  alt=""
                />
                <span>My Resume</span></a
              >
            </li>
            <li>
              <a href="#">
                <img
                  src="./Images/Dashboard-Image/Assets/cover-letter.png"
                  alt=""
                />
                <span>My Cover Letter</span></a
              >
            </li>
            <li>
              <a href="#">
                <img src="./Images/Dashboard-Image/Assets/web.png" alt="" />
                <span>Website</span></a
              >
            </li>
            <li>
              <a href="#">
                <img
                  src="./Images/Dashboard-Image/Assets/shop_cart.png"
                  alt=""
                />
                <span>Buy Templates</span></a
              >
            </li>
            <li>
              <a href="#">
                <img
                  src="./Images/Dashboard-Image/Assets/feedback.png"
                  alt=""
                />
                <span>Feedback</span></a
              >
            </li>
          </ul>
        </div>
      </aside>
      <main class="container">
        <form action="newResume.php" method="post">
          <div class="form-nav">
            <div class="inner-nav">
              <ul>
                <li><a href="../hamroCV/newResume.php">Profile</a></li>
                <li><a href="../hamroCV/experience.php">Experience</a></li>
                <li><a href="../hamroCV/skill.php">Skill</a></li>
                <li><a href="../hamroCV/education.php">Education</a></li>
                <li><a href="../hamroCV/summary.php">Summary</a></li>
                <li><a href="../hamroCV/interest.php">Interest</a></li>
                <li><a href="../hamroCV/photo.php">Photo</a></li>
              </ul>
            </div>
            <button>+ Add Section</button>
          </div>
          <div class="form-container">
            <div class="form-input">
              <label for="fname">First Name</label>
              <input type="text" id="fname" name="fname" />
            </div>
            <div class="form-input">
              <label for="mname">Middle Name(Optional)</label>
              <input type="text" id="mname" name="mname" />
            </div>
            <div class="form-input">
              <label for="lname">Last Name</label>
              <input type="text" id="lname" name="lname" />
            </div>
            <div class="form-input">
              <label for="mname">Gender</label>
              <select name="gender" id="gender">
                <option value="gender">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="form-input">
              <label for="dob">Birth Date</label>
              <input type="date" id="dob" name="dob" />
            </div>
            <div class="form-input">
              <label for="mstatus">Marital Status</label>
              <input type="text" id="mstatus" name="mstatus" />
            </div>
            <div class="form-input">
              <label for="profession">Profession</label>
              <input type="text" id="profession" name="profession" />
            </div>
            <div class="form-input">
              <label for="saddr">Street Address</label>
              <input type="text" id="saddr" name="saddr" />
            </div>
            <div class="form-input">
              <label for="city">City</label>
              <input type="text" id="city" name="city" />
            </div>
            <div class="form-input">
              <label for="state-province">State / Province</label>
              <input type="text" id="state-province" name="state-province" />
            </div>
            <div class="form-input">
              <label for="nationality">Nationality</label>
              <select name="nationality" id="nationality">
                <option value="country">Select Country</option>
                <option value="nepal">Nepal</option>
                <option value="india">India</option>
                <option value="pakistan">Pakistan</option>
                <option value="bangladesh">Bangladesh</option>
                <option value="bharat">Bharat</option>
                <option value="sri lanka">Sri Lanka</option>
                <option value="australia">Australia</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="form-input">
              <label for="passport">Passport Number (Optional)</label>
              <input type="text" id="passport" name="passport" />
            </div>
            <div class="form-input">
              <label for="phnumber">Phone Number</label>
              <input type="number" id="phnumber" name="phnumber" />
            </div>
            <div class="form-input">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" />
            </div>
          </div>
          <div class="btn">
            <button type="submit" value="Save">Save</button>
            <button>Next &gt;&gt;</button>
          </div>
        </form>
      </main>
    </section>
    <footer>
      <p>Copyright &copy; 2024 hamroCV. Designed By Ujwol, Raju, Saurav</p>
    </footer>
  </body>
</html>
