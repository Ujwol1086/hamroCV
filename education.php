<!-- Education -->
<?php
  session_start();

// Check if the user is logged in
if (isset($_SESSION['fullName'])) {
    $userName = $_SESSION['fullName'];
} else {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamroCV"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instituteName = $_POST['institue'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $degree = $_POST['degree'];
    $gsdate = $_POST['gsdate'];
    $gedate = $_POST['gedate'];

    $sql = "INSERT INTO education (user_name, institute_name, city, state, degree, graduation_start_date, graduation_end_date) 
            VALUES ('$userName', '$instituteName', '$city', '$state', '$degree', '$gsdate', '$gedate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
     if (mysqli_query($conn, $sql)) {
        header("Location: summary.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="education.css" />
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
        <form action="" method="post">
          <div class="form-nav">
            <div class="inner-nav">
              <ul>
                <li><a href="../hamroCV/newResume.php">Profile</a></li>
                <li><a href="../hamroCV/experience.php">Experience</a></li>
                <li><a href="../hamroCV/skill.php">Skill</a></li>
                <li><a href="#">Education</a></li>
                <li><a href="../hamroCV/summary.php">Summary</a></li>
                <li><a href="../hamroCV/interest.php">Interest</a></li>
                <li><a href="../hamroCV/photo.php">Photo</a></li>
              </ul>
            </div>
            <button>+ Add Section</button>
          </div>
          <div class="inner-container">
            <div class="form-container">
              <div class="form-input">
                <label for="institue">Insitute Name</label>
                <input type="text" id="institue" name="institue" />
              </div>
              <div class="form-input">
                <label for="city">City</label>
                <input type="text" id="city" name="city" />
              </div>
              <div class="form-input">
                <label for="state">State</label>
                <input type="text" id="state" name="state" />
              </div>
              <div class="form-input">
                <label for="degree">Degree</label>
                <select name="degree" id="degree">
                  <option value="select">Select</option>
                  <option value="Bachelor of Science in Computer Science and Information Technology">Bachelor of Science in Computer Science and Information Technology (BSc CSIT)</option>
                  <option value="Bachelor of Business Administration">Bachelor of Business Administration (BBA)</option>
                  <option value="Bachelor of Business Management">Bachelor of Business Management (BBM)</option>
                  <option value="Bachelor of Information Management">Bachelor of Information Management (BIM)</option>
                  <option value="Bachelor of Business Studies">Bachelor of Business Studies (BBS)</option>
                  <option value="Bachelor of Engineering in Civil">Bachelor of Engineering in Civil (BE Civil)</option>
                  <option value="Bachelor of Engineering in Computer">Bachelor of Engineering in Computer (BE Computer)</option>
                  <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing (BSc Nursing)</option>
                  <option value="Bachelor of Education">Bachelor of Education (BEd)</option>
                  <option value="Bachelor of Public Health">Bachelor of Public Health (BPH)</option>
                  <option value="Bachelor of Hotel Management">Bachelor of Hotel Management (BHM)</option>
                  <option value="Bachelor of Laws">Bachelor of Laws (LLB)</option>
                  <option value="Bachelor of Fine Arts">Bachelor of Fine Arts (BFA)</option>
                  <option value="Bachelor of Arts in Social Work">Bachelor of Arts in Social Work (BASW)</option>
                  <option value="Bachelor of Computer Application">Bachelor of Computer Application (BCA)</option>
                </select>
              </div>
              <div class="form-input">
                <label for="gsdate">Graduation Start Date</label>
                <input type="date" id="gsdate" name="gsdate" />
              </div>
              <div class="form-input">
                <label for="gedate">Graduation End Date</label>
                <input type="date" id="gedate" name="gedate" />
              </div>
            </div>
            <div class="btn">
              <button>&lt;&lt; Previous</button>
              <button type="submit">Save</button>
              <button>Next &gt;&gt;</button>
            </div>
          </div>
        </form>
      </main>
    </section>
    <footer>
      <p>Copyright &copy; 2024 hamroCV. Designed By Ujwol, Raju, Saurav</p>
    </footer>
  </body>
</html>
