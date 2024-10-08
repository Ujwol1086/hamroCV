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
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
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
              <a href="#">
                <img
                  src="./Images/Dashboard-Image/Assets/Profile_image2.png"
                  alt=""
                />
                <span><?php echo $userName; ?></span>
              </a>
            </li>
            <li>
              <a href="#">
                <img
                  src="./Images/Dashboard-Image/Assets/dashboard_active.png"
                  alt=""
                />
                <span>Dashboard</span></a
              >
            </li>
            <li>
              <a href="../hamroCV/myResume.php">
                <img src="./Images/Dashboard-Image/Assets/resume.png" alt="" />
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
        <div class="carousel-container">
          <div class="box1">
            <a href="../hamroCV/newResume.html">
            <img
              src="./Images/Dashboard-Image/Assets/Carousel-Plus.png"
              alt=""
            />
            <p>New Resume</p>
            </a>
          </div>
          <div class="box2">
            <img
              src="./Images/Dashboard-Image/Assets/Carousel-Plus.png"
              alt=""
            />
            <p>New Cover Letter</p>
          </div>
          <div class="box3">
            <img src="./Images/Dashboard-Image/Assets/resume-bg.jpg" alt="" />
            <div class="resume-box">
              <img src="./Images/Dashboard-Image/Assets/resume.png" alt="" />
              <p>My Resume</p>
            </div>
          </div>
          <div class="box4">
            <img
              src="./Images/Dashboard-Image/Assets/coverletter-bg.jpg"
              alt=""
            />
            <div class="resume-box">
              <img
                src="./Images/Dashboard-Image/Assets/cover-letter.png"
                alt=""
              />
              <p>My Cover Letter</p>
            </div>
          </div>
          <div class="box5">
            <img src="./Images/Dashboard-Image/Assets/website-bg.jpg" alt="" />
            <div class="resume-box">
              <img src="./Images/Dashboard-Image/Assets/web.png" alt="" />
              <p>Website</p>
            </div>
          </div>
        </div>
        <div class="carousel-leftRight">
          <div class="left">
            <img
              src="./Images/Dashboard-Image/Assets/carousel-left.png"
              alt=""
              width="50"
            />
          </div>
          <div class="right">
            <img
              src="./Images/Dashboard-Image/Assets/carousel-right.png"
              alt=""
              width="50"
            />
          </div>
        </div>
        <div class="comments">
          <div class="comment-box">
            <div class="profile-description">
              <div class="profile-name">
                <div class="name">
                  <img
                    src="./Images/Dashboard-Image/Assets/Profile_image2.png"
                    alt=""
                  />
                  <span>Ujwol Aryal</span>
                </div>
                <img
                  class="more"
                  src="./Images/Dashboard-Image/Assets/more.png"
                  alt=""
                />
              </div>
              <p>I'm a Frontend and Backend Developer.</p>
            </div>
            <div class="like-dislike">
              <div class="icons">
                <div class="like">
                  <img
                    src="./Images/Dashboard-Image/Assets/like_button.png"
                    alt=""
                  />
                </div>
                <div class="dislike">
                  <img
                    src="./Images/Dashboard-Image/Assets/dislike_button.png"
                    alt=""
                  />
                </div>
              </div>
              <div class="post-input">
                <input type="text" placeholder="Leave a comment" />
                <button type="submit">Post</button>
              </div>
            </div>
          </div>
          <div class="comment-box">
            <div class="profile-description">
              <div class="profile-name">
                <div class="name">
                  <img
                    class="more"
                    src="./Images/Dashboard-Image/Assets/Profile_image2.png"
                    alt=""
                  />
                  <span>Raju Lopchan</span>
                </div>
                <img
                  class="more"
                  src="./Images/Dashboard-Image/Assets/more.png"
                  alt=""
                />
              </div>
              <p>I'm a UI/UX & Frontend Developer.</p>
            </div>
            <div class="like-dislike">
              <div class="icons">
                <div class="like">
                  <img
                    src="./Images/Dashboard-Image/Assets/like_button.png"
                    alt=""
                  />
                </div>
                <div class="dislike">
                  <img
                    src="./Images/Dashboard-Image/Assets/dislike_button.png"
                    alt=""
                  />
                </div>
              </div>
              <div class="post-input">
                <input type="text" placeholder="Leave a comment" />
                <button type="submit">Post</button>
              </div>
            </div>
          </div>
          <div class="comment-box">
            <div class="profile-description">
              <div class="profile-name">
                <div class="name">
                  <img
                    src="./Images/Dashboard-Image/Assets/Profile_image2.png"
                    alt=""
                  />
                  <span>Saurav Manandhar</span>
                </div>
                <img
                  class="more"
                  src="./Images/Dashboard-Image/Assets/more.png"
                  alt=""
                />
              </div>
              <p>I'm a UI/UX & Backend Developer</p>
            </div>
            <div class="like-dislike">
              <div class="icons">
                <div class="like">
                  <img
                    src="./Images/Dashboard-Image/Assets/like_button.png"
                    alt=""
                  />
                </div>
                <div class="dislike">
                  <img
                    src="./Images/Dashboard-Image/Assets/dislike_button.png"
                    alt=""
                  />
                </div>
              </div>
              <div class="post-input">
                <input type="text" placeholder="Leave a comment" />
                <button type="submit">Post</button>
              </div>
            </div>
          </div>
          <div class="comment-box">
            <div class="profile-description">
              <div class="profile-name">
                <div class="name">
                  <img
                    src="./Images/Dashboard-Image/Assets/Profile_image2.png"
                    alt=""
                  />
                  <span>Lochan Maharjan</span>
                </div>
                <img
                  class="more"
                  src="./Images/Dashboard-Image/Assets/more.png"
                  alt=""
                />
              </div>
              <p>I'm a something developer</p>
            </div>
            <div class="like-dislike">
              <div class="icons">
                <div class="like">
                  <img
                    src="./Images/Dashboard-Image/Assets/like_button.png"
                    alt=""
                  />
                </div>
                <div class="dislike">
                  <img
                    src="./Images/Dashboard-Image/Assets/dislike_button.png"
                    alt=""
                  />
                </div>
              </div>
              <div class="post-input">
                <input type="text" placeholder="Leave a comment" />
                <button type="submit">Post</button>
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
