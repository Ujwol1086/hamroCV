<!-- Interest -->
<?php
  session_start();

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
      $interest1 = $_POST['interest1'];
      $interest2 = $_POST['interest2'];
      $interest3 = $_POST['interest3'];

      $sql = "INSERT INTO interests (user_name, interest1, interest2, interest3) VALUES ('$userName', '$interest1', '$interest2', '$interest3')";

      if ($conn->query($sql) === TRUE) {
          echo "New interests added successfully!";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="interest.css" />
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
                <li><a href="../hamroCV/education.php">Education</a></li>
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
                <h2>Interest / Hobbies</h2>
                <input type="text" id="interest1" name="interest1" />
                <input type="text" id="interest2" name="interest2" />
                <input type="text" id="interest3" name="interest3" />
              </div>
            </div>
            <div class="add-skill">
              <img src="./Images/Dashboard-Image/Assets/addmore.png" alt="" />
              <p>Add More Interest</p>
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
