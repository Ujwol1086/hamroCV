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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="myResume.css" />
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
          <h3><?php echo $userName;  ?></h3>
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
              <a href="../hamroCV/myResume.html">
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
        <a href="../hamroCV/newResume.php">
          <div class="box">
            <img
              src="./Images/Dashboard-Image/Assets/Carousel-Plus.png"
              alt=""
            />
            <p>New Resume</p>
          </div>
        </a>
        <div class="myresume">
          <div class="resume-image">
            <!-- <img src="./Images/Dashboard-Image/Assets/cv-1.jpg" alt="" /> -->
            <p>&nbsp;&nbsp;Select</p>
            <p>Template</p>
          </div>
          <div class="myresume-content">
            <h3>Resume name</h3>
            <div class="completion">
              <p>Completion</p>
              <p>50%</p>
            </div>
            <div class="progress-container">
              <div class="progress-bar" id="progressBar"></div>
            </div>
            <div class="buttons">
              <button class="edit">
                <p>Edit</p>
                <img src="./Images/Dashboard-Image/Assets/edit.png" alt="" />
              </button>
              <div class="other-btn">
                <button class="download">
                  <img
                    src="./Images/Dashboard-Image/Assets/download.png"
                    alt=""
                  />
                </button>
                <button class="print">
                  <img src="./Images/Dashboard-Image/Assets/print.png" alt="" />
                </button>
                <button class="more1">
                  <img src="./Images/Dashboard-Image/Assets/more.png" alt="" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </section>
    <footer>
      <p>Copyright &copy; 2024 hamroCV. Designed By Ujwol, Raju, Saurav</p>
    </footer>
  </body>
</html>
