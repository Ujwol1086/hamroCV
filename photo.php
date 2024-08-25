<!-- Photo -->
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
    $facebook_link = $_POST['facebook'];
    $instagram_link = $_POST['instagram'];
    $linkedin_link = $_POST['linkedin'];
    $website_link = $_POST['website'];

    $sql = "INSERT INTO social_links ( facebook_link, instagram_link, linkedin_link, website_link, userName)
            VALUES ( '$facebook_link', '$instagram_link', '$linkedin_link', '$website_link', '$userName')";

    if ($conn->query($sql) === TRUE) {
        echo "Social links saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

     if (mysqli_query($conn, $sql)) {
        header("Location: cv.php"); 
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
    <link rel="stylesheet" href="photo.css" />
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
                <li><a href="#">Photo</a></li>
              </ul>
            </div>
            <button>+ Add Section</button>
          </div>
          <div class="inner-container">
            <div class="photo-container">
              <div class="photo">
                <div class="photo-image"></div>
                <a href="#">Upload Your Photo</a>
              </div>
              <div class="photo-content">
                <h3>CV Photo Tips</h3>
                <ul>
                  <li>
                    &#9866; Your Final photo should show your head, neck and
                    shoulders only
                  </li>
                  <li>
                    &#9866; Your photo will appear 3.5cm wide by 4.5cm cm tall
                  </li>
                  <li>&#9866; Acceptable formats: .JPG, .GIF, .PNG</li>
                </ul>
                <p>File size is limited to 2 MB</p>
                <p>
                  <strong>Warning:</strong> Including a photo with your CV is
                  not recomended when applying for jobs in the United Kingdom,
                  the United States or Canada. Only use this template if you
                  intend to apply for jobs outside these areas or have a
                  specific need for a CV that includes a photo. Otherwise,
                  please click the Finish button to Download Resume.
                </p>

                <h2>Add Social Links</h2>
                <div class="social-links">
                  <div class="form-input">
                    <label for="facebook">Facebook</label>
                    <input type="text" id="facebook" name="facebook" />
                  </div>
                  <div class="form-input">
                    <label for="instagram">Instagram</label>
                    <input type="text" id="instagram" name="instagram" />
                  </div>
                  <div class="form-input">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" id="linkedin" name="linkedin" />
                  </div>
                  <div class="form-input">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" />
                  </div>
                </div>
              </div>
            </div>
            <div class="btn">
              <button>&lt;&lt; Previous</button>
              <button type="submit">Save</button>
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
