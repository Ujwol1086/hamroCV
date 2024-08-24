<?php
session_start();
// Check if the user is logged in or not
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
    $skill_name = $_POST['skill'];
    $skill_level = $_POST['skill_level'];

    if ($skill_level != "select") {
        $sql = "INSERT INTO skills (user_name, skill_name, skill_level) 
                VALUES ('$userName', '$skill_name', '$skill_level')";

        if ($conn->query($sql) === TRUE) {
            echo "New skill added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please select a valid skill level.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="skill.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <title>My Resume - Add Skill</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-content">
                <h1>hamroCV</h1>
                <div class="hamburger-menu">
                    <img src="./Images/Dashboard-Image/Assets/bergetr-menu2.png" alt="Menu" />
                </div>
                <div class="input">
                    <input type="text" placeholder="Search" />
                    <img src="./Images/Dashboard-Image/Assets/search.png" alt="Search" />
                </div>
                <div class="notification-icon">
                    <img src="./Images/Dashboard-Image/Assets/notification.png" alt="Notifications" />
                </div>
            </div>
            <div class="profile">
                <img src="./Images/Dashboard-Image/Assets/Profile_image.png" alt="Profile" />
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
                            <img src="./Images/Dashboard-Image/Assets/Profile_image2.png" alt="Profile" />
                            <span><?php echo $userName; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="../hamroCV/dashboard.php">
                            <img src="./Images/Dashboard-Image/Assets/bergetr-menu1.png" alt="Dashboard" />
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="../hamroCV/myResume.php">
                            <img src="./Images/Dashboard-Image/Assets/resume_active.png" alt="My Resume" />
                            <span>My Resume</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./Images/Dashboard-Image/Assets/cover-letter.png" alt="Cover Letter" />
                            <span>My Cover Letter</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./Images/Dashboard-Image/Assets/web.png" alt="Website" />
                            <span>Website</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./Images/Dashboard-Image/Assets/shop_cart.png" alt="Buy Templates" />
                            <span>Buy Templates</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./Images/Dashboard-Image/Assets/feedback.png" alt="Feedback" />
                            <span>Feedback</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                    <button type="button">+ Add Section</button>
                </div>
                <div class="inner-container">
                    <div class="form-container">
                        <div class="form-input">
                            <label for="skill">Skill</label>
                            <input type="text" id="skill" name="skill" required />
                        </div>
                        <div class="form-input">
                            <label for="skill_level">Level</label>
                            <select name="skill_level" id="skill_level" required>
                                <option value="select">Select</option>
                                <option value="Novice">Novice</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Professional">Professional</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>
                    </div>
                    <div class="add-skill">
                        <img src="./Images/Dashboard-Image/Assets/addmore.png" alt="Add More" />
                        <p>Add More Skill</p>
                    </div>
                    <div class="btn">
                        <button type="button">&lt;&lt; Previous</button>
                        <button type="submit">Save</button>
                        <button type="button">Next &gt;&gt;</button>
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
